<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // use HasFactory;
    public function course()
    {
       return $this->belongsTo('App\Models\Course','course_id');
    }
    //関数：eventsテーブルからcourseテーブルのcourse_idカラムにリレーションする
    
    public function mylists()
    {
        return $this->belongsToMany(User::class, 'mylists', 'event_id', 'user_id');
    }
}
