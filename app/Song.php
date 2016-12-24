<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table="songs";
    protected $primaryKey='song_id';
    public $timestamps=false;
}
