<?php

namespace Article;

use Illuminate\Database\Eloquent\Model;
use Article\User;
class Setlist extends Model
{
    protected $guarded = array('id');
    protected $table = 'setlists';
    
    public static $rules = array(
        'name' => 'required',
        'title' => 'required',
        'place' => 'required',
        'body' => 'required',
        
        );
        
    public function user()
    {
        return $this->belongsTo('Article\User');
    }
    
    public function comment()
    {
        return $this->hasMany('Article\Comment');
    }
}
