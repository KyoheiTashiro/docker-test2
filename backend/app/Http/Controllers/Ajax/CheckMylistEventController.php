<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use CreateMylistsTable;
use Illuminate\Http\Request;
use App\Models\Mylist;
use Auth;

class CheckMylistEventController extends Controller
{
    public function checkMylist($event_id){
        $mylistEvent=Mylist::where('user_id','=',Auth::id())
        ->where('event_id','=',$event_id)
        ->exists();
        return response()->json(compact('mylistEvent'),200);
    }
}

//Mylistsテーブルに保存されたイベントデータの有無を検索して、
//有る場合は真偽値の1をreturnする


// ★現在不使用