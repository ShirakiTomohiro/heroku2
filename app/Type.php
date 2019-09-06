<?php

namespace Article;

use Illuminate\Database\Eloquent\Model;

    class Type extends Model
   {
        protected $guarded = array('id');
        
        
        
        public function news()
    {
        return $this->hasMany('Article\News');
    }
   }

    