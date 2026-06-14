<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'tbl_films';
    protected $fillable = [
        'title', 'genre', 'director', 'release_year', 'synopsis', 'poster_url'
    ];
}
