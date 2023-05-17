<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocksuspendumagasin extends Model
{
    use HasFactory;
    protected $primaryKey='idstocksuspendumagasin';

    public $timestamps = false;
    protected $fillable = ['idmagasin','idlaptop','quantite','etat'];
}
