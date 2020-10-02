<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Article extends Model {
	//
    protected $table = 'articles';
    public function category()
    {
        # code...
        return $this->belongsTo('App\Category');
    }
    public function comments()
    {
        # code...
        return $this->hasMany('App\Comment');
    }
}
