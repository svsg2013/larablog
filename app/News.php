<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';

    public function news_tag(){
        return $this->hasMany('App\News_tag','news_id','id');
    }
}
