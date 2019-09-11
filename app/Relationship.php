<?php

namespace Article;


use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function user()
    {
        return $this->belongsTo('Article\Relationship','follower_id');
    }
    
    public function news()
    {
        return $this->belongsTo('Article\Relationship');
    }
}
