<?php

namespace ARTICLE;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'record';
    
    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
        );
}
