<?php

namespace App\Http\Controllers\Client;

use App\Models\Banners;
use App\Models\FaqDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spiderworks\MiniWeb\Models\Page;

class PageController extends Controller
{

    public function home(){
        return view('client.pages.home');
    }

    public function single_page($slug){
        $page = Page::where('slug',$slug)->first();
        if(!$page){return redirect('404');}

        if($page->old_page_id == null){
            $banners =  Banners::where('page_id',$page->id)->get();
            $faq = FaqDetails::where('page_id',$page->id)->get();
            return view('client.pages.page',compact('page','banners','faq'));
        }

        return view('client.pages.single_page',compact('page'));
    }

    public function brochure($slug=null){
        if(!$slug){$slug='profile';}
        return view('client.pages.brochure',compact('slug'));
    }

    public function faq_form($id,$que_id){

        if($que_id >0 ) {
            $obj = FaqDetails::find($que_id);
        }else{
            $obj = new FaqDetails();
        }

        return view('client.modal.faq_form',compact('obj','id'));
    }


    public function faq($id){
            $faq_details = FaqDetails::where('page_id',$id)->get();
        return view('client.modal.faq_list',compact('faq_details','id'));
    }


    public function faq_save(Request $request){

        $faq = new FaqDetails;
        if($request->id){
            $faq = FaqDetails::find($request->id);
        }
        $faq->page_id = $request->page_id;
        $faq->question = $request->que;
        $faq->answer = $request->answer;
        $faq->save();
    }


    public function banner_form($id,$que_id){

        if($que_id >0 ) {
            $obj = Banners::find($que_id);
        }else{
            $obj = new Banners();
        }

        return view('client.modal.banner_form',compact('obj','id'));
    }


    public function banner($id){
        $banners = Banners::where('page_id',$id)->get();
        return view('client.modal.banner_list',compact('banners','id'));
    }


    public function banner_save(Request $request){

        $faq = new Banners();
        if($request->id) {
            $faq = Banners::find($request->id);
        }
        $faq->page_id = $request->page_id;
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->image_id = $request->image_id;
        $faq->save();
    }

    public function banner_remove($id){
        $banner = Banners::find(decrypt($id));
        if($banner){$banner->delete();}
    }

    public function faq_remove($id){
        $banner = FaqDetails::find(decrypt($id));
        if($banner){$banner->delete();}
    }


}
