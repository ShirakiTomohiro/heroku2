<?php

namespace Article;

use Illuminate\Database\Eloquent\Model;
use Article\News;
use Article\User;
class Comment extends Model
{
    protected $guarded = array('id');
    

    
    public function news()
    {
         return $this->belongsTo('Article\News');
    }
    
    
    
    public function user()
    {
        return $this->belongsTo('Article\User');
    }
    
}
