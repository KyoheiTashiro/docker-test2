<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mylist extends Model
{
    use HasFactory;
    protected $fillable = ['event_id','user_id']; 

    public function mylistEvent()
    {
        return $this->belongsTo('App\Models\Event','event_id');
    }
    
     public function course()
    {
       return $this->belongsTo('App\Models\Course','course_id');
    }
}

//event_idからリレーションしたeventsテーブルのデータを取得する関数