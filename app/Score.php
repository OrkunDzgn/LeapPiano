<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table="scores";
    protected $primaryKey='score_id';
    protected $fillable = [
        'user_id', 'score_id', 'song_id',
    ];
    public $timestamps=false;

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function songs(){
        return $this->hasOne('App\Song','song_id','song_id');
    }
}
