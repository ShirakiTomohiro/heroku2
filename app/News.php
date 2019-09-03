<?php

namespace ARTICLE;

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
            return $this->hasMany('ARTICLE\History');
        }
        
        public function user()
        {
            return $this->belongsTo('ARTICLE\User');
        }
        
        public function likes()
        {
            return $this->hasMany('ARTICLE\Like');
        }
        
        public function comment()
        {
            return $this->hasMany('ARTICLE\Comment');
        }
}
