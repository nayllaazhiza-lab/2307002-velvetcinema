<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;

    // Field yang boleh diisi
    protected $fillable = ['user_id', 'movie_id', 'title', 'poster_path'];
}