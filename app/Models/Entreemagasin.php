<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreemagasin extends Model
{
    use HasFactory;
    protected $primaryKey='identreemagasin';
    public $timestamps = false;
    protected $fillable = ['idmagasin','idlaptop','quantite','date'];
}
