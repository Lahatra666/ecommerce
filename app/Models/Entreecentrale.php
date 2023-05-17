<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreecentrale extends Model
{
    use HasFactory;
    protected $primaryKey='identreecentrale';
    public $timestamps = false;
    protected $fillable = ['idlaptop','quantite','date'];
}
