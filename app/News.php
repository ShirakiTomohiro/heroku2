<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
        );
        
        // Newsモデルに関連付けを行う
        public function histories()
        {
            return $this->hasMany('App\History');
        }
        
        public function user()
        {
            return $this->belongsTo('App\User');
        }
        
        public function likes()
        {
            return $this->hasMany('App\Like');
        }
        
        public function comment()
        {
            return $this->hasMany('App\Comment');
        }
}
