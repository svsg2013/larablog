<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateProd extends Model
{
    protected $table= 'cate_prods';

    public function childcate(){
        return $this->hasMany('App\ChildProd','cateParen_id','id');
    }

}
