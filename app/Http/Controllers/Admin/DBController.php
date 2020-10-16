<?php

namespace App\Http\Controllers\Admin;

use App\Models\OldPages;
use DOMWrap\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spiderworks\MiniWeb\Models\Page;

class DBController extends Controller
{
    public function sync_pages(){
        $files = scandir(getcwd().'/public/old');

        foreach ($files as $obj){


        if (strpos($obj, '.html') !== false) { echo $obj;

            $a = file_get_contents(asset('old/'.$obj));
            $doc = new Document();
            $do = new Document();
            $doc->html($a);
            $do->html('<div>'.$a.'</div>');
            $header = $doc->find('header');
            $footer1 = $doc->find('.footer1');
            $copyright_info = $doc->find('.copyright_info');
            $fusection4 = $doc->find('.fusection4');





            $old = OldPages::where('file_name',$obj)->first();
            if(!$old){$old = new OldPages();}

            $old->header = $header;
            $old->footer1 = $footer1;
            $old->copyright_info = $copyright_info;
            $old->fusection4 = $fusection4;
            $old->file_name = $obj;
            $old->future_slug = '-';
            $old->full = $a;

            $doc = new Document();
            $a = file_get_contents(asset('old/'.$obj));
            $doc = new Document();
            $doc->html($a);
            $doc->find('head')->remove();
            $doc->find('script')->remove();
            $doc->find('header')->remove();
            $doc->find('.footer1')->remove();
            $doc->find('.copyright_info')->remove();
            $doc->find('.fusection4')->remove();

            $old->body = $doc;



            $old->save();
        }

        }

    }

public function delete_all_between($beginning, $end, $string) {
        $beginningPos = strpos($string, $beginning);
        $endPos = strpos($string, $end);
        if ($beginningPos === false || $endPos === false) {
            return $string;
        }

        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

        return $this->delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
    }


    public function import_pages(){
//        $old = OldPages::all();
        $old = OldPages::all();

        foreach ($old as $obj){
            $new_page = Page::where('old_page_id',$obj->id)->first();
            if(!$new_page){$new_page = new Page();}


        //    if($new_page->slug == 'saba-hr-data-visualization-dubai'){return $obj->full;}

            $string = $obj->full;
            $out = $this->delete_all_between('<header id="header">', '</header>', $string);
            $out = $this->delete_all_between('<head>', '</head>', $out);
            $out = $this->delete_all_between('<script', '</script>', $out);
            $out = $this->delete_all_between('<!-- end content area -->', '<!-- end copyright info -->', $out);
            $out = $this->delete_all_between('<div class="footer1">', '<!-- end footer -->', $out);
            $out =str_replace('img src="images','img src="'.asset('old/images'),$out);
            $out =str_replace('src="images','src="'.asset('old/images'),$out);
            $out =str_replace('img src="js','img src="'.asset('old/js'),$out);
            $data =str_replace('data-src="images','data-src="'.asset('old/images'),$out);


         //   if($new_page->slug == 'saba-hr-data-visualization-dubai'){return $data;}


            $new_page->old_page_id = $obj->id;
            $new_page->slug = str_replace("-html","",$this->slugify($obj->file_name));
            $new_page->name = 'tba';
            $new_page->short_description = '-';
            $new_page->content = $data;
            $new_page->parent_id = 0;
            $new_page->browser_title = '';
            $new_page->meta_description = '';
            $new_page->meta_keywords = '';
            $new_page->top_description = '';
            $new_page->bottom_description = '';
            $new_page->extra_css = '';
            $new_page->extra_js = '';
            $new_page->status = 1;
            $new_page->save();
        }
    }

    public function remove_tags(){
        $pages = Page::all();

        foreach ($pages as $obj){


            $doc = new Document();
            $doc->html($obj->content);
            $doc->find('header')->remove();

            $o = Page::find($obj->id);
            $o->content = $doc->contents();
            $o->slug = str_replace("-html","",$obj->slug); ;
            $o->save();

        }
    }

    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }



}
