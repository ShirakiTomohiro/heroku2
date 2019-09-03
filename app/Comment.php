<?php

namespace ARTICLE;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = array('id');
    

    
    public function news()
    {
         return $this->belongsTo('ARTICLE\News');
    }
}
