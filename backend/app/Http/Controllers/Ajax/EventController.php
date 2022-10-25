<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index() {
        $userId = Auth::id();
        $events = Event::with('course')
        ->withCount(['mylists' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
        ->where('date','>=',Carbon::today())
        ->orderBy('date','asc')
        ->get();
        return response()->json(compact('events'),200); 

        //eventsテーブルから全データ取得

    }
}




//course → course_idからリレーションしてるcoursesテーブルのコース名を取得
//mylists → クエリの制約:eventsデータ1つに対して、
// mylistsテーブルからuser_idが同じものをcount数で取得