<?php

namespace Article;

use Illuminate\Database\Eloquent\Model;
use Article\User;
use Article\Setlist;
class Cont extends Model
{
    protected $guarded = array('id');
    
    public function user()
    {
        return $this->belongsTo('Article\User');
    }
    
    public function setlist()
    {
        return $this->belongsTo('Article\Setlist');
    }
}

