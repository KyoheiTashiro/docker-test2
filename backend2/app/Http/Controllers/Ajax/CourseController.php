<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use Carbon\Carbon;

class CourseController extends Controller
{
    public function show($courseName){
         $userId = Auth::id();
         $events = Event::with('course')
         ->whereHas('course',function($query)use($courseName){
            $query->where('api_keyword','=',$courseName);
         })
         ->withCount(['mylists' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
        ->where('date','>=',Carbon::today())
        ->orderBy('date','asc')
        ->get();
        return response()->json(compact('events'),200); 
    }
}

//イベントをコースごとにフィルターして表示する処理

    
