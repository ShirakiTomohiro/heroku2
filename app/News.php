<?php

namespace Article;

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
            return $this->hasMany('Article\History');
        }
        
        public function user()
        {
            return $this->belongsTo('Article\User');
        }
        
        public function likes()
        {
            return $this->hasMany('Article\Like');
        }
        
        public function comment()
        {
            return $this->hasMany('Article\Comment');
        }
        
        public function type()
        {
            return $this->belongsTo('Article\Type');
        }
        
        public function setlist()
        {
            return $this->hasMany('Article\Setlist');
        }
        
        
}
