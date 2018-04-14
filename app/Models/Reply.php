<?php

namespace App\Models;

class Reply extends Model
{
    protected $fillable = ['content'];

    //一个回复属于一个主题
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    //一个回复属于一个作者
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
