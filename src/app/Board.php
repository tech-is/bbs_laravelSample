<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Board;

class board extends Model
{
    protected $fillable = ['name', 'message'];
    protected $table = 'board';
}
