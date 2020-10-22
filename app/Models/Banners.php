<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = 'banners';


    public function image()
    {
        return $this->belongsTo('Spiderworks\MiniWeb\Models\MediaLibrary', 'image_id');
    }



}
