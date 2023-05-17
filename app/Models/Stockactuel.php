<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockactuel extends Model
{
    use HasFactory;
    protected $primaryKey='idstockactuel';
    public $timestamps = false;
    protected $fillable = ['idlaptop','quantite'];

}
