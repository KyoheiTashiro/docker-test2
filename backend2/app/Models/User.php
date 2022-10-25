<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mylists()
    {
        return $this->belongsToMany(Event::class, 'mylists', 'user_id','event_id')->withTimestamps();
    }

    public function isMylist($event_id)
    {
        return $this->mylists()->where('event_id','=',$event_id)->exists();
    }

    public function mylist($event_id)
    {
        if($this->isMylist($event_id)){
            // 有るならなにもしない
        }else{
            $this->mylists()->attach($event_id);
            //マイリスト無いなら保存する
        }
    }

    public function noMylist($event_id)
    {
        if($this->isMylist($event_id)){
            $this->mylists()->detach($event_id);
        }else{
        }
    }
}
