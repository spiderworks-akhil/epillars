<?php

namespace App\Http\Controllers\Client;

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
        if(!$page){$page = new Page();}
        return view('client.pages.single_page',compact('page'));
    }


}
