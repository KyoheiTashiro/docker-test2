<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use Carbon\Carbon;


class MonthEventController extends Controller
{
    public function show($yearMonth){
        $userId = Auth::id();
        $events = Event::with('course')
        ->where('date','>=',$yearMonth.'-01')
        ->where('date','<=',$yearMonth.'-31')
        ->withCount(['mylists' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
        ->where('date','>=',Carbon::today())
        ->orderBy('date','asc')
        ->get();
        return response()->json(compact('events'),200); 
    }
}

//パラメータ(月)によってイベントを検索して取得
