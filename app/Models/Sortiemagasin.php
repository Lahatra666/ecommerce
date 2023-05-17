<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortiemagasin extends Model
{
    use HasFactory;
    protected $primaryKey='idsortiemagasin';
    public $timestamps = false;
    protected $fillable = ['idmagasin','idlaptop','quantite','date'];
}
