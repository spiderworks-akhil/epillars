<?php

namespace App\Widgets;

use App\Models\Banners;
use Arrilot\Widgets\AbstractWidget;
use Spiderworks\MiniWeb\Models\Page;

class Clients extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        $clients = Banners::where('page_id',91)->get();
        $page = Page::find(91);

        if(!$page){return false;}

        return view('widgets.clients', [
            'clients' => $clients,
            'page' => $page
        ]);


    }
}
