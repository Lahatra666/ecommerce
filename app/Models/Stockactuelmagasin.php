<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockactuelmagasin extends Model
{
    use HasFactory;
    protected $primaryKey='idstockactuelmagasin';

    public $timestamps = false;
    protected $fillable = ['idmagasin','idlaptop','quantite'];
}
