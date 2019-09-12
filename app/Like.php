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

/*
insert into types (name, created_at, updated_at) values 
('マンガ', '2019-09-04 00:00:00', '2019-09-04 00:00:00'),
('コラム', '2019-09-04 00:00:00', '2019-09-04 00:00:00'),
('小説', '2019-09-04 00:00:00', '2019-09-04 00:00:00'),
('写真', '2019-09-04 00:00:00', '2019-09-04 00:00:00'),
('音楽', '2019-09-04 00:00:00', '2019-09-04 00:00:00'),
('ビジネス', '2019-09-04 00:00:00', '2019-09-04 00:00:00'),
('ライフスタイル', '2019-09-04 00:00:00', '2019-09-04 00:00:00'),
('テクノロジー', '2019-09-04 00:00:00', '2019-09-04 00:00:00'),
('エンタメ', '2019-09-04 00:00:00', '2019-09-04 00:00:00');
*/