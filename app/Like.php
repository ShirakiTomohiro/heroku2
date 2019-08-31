<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'news_id'];
    
    public function news()
    {
        return $this->belongsTo('App\News');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
