<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use Carbon\Carbon;

class SearchEventController extends Controller
{   
    public function index(Request $request){
        $userId = Auth::id();
        $keyword = $request->input('keyword');
        $events=Event::with('course')
        ->where('name','like',"%$keyword%")
        ->withCount(['mylists' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
        ->where('date','>=',Carbon::today())
        ->orderBy('date','asc')
        ->get();
        return response()->json(compact('events'),200);
    }
}

//イベントをキーワード(文字列)で検索して取得する処理