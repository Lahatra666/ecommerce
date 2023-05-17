<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortiecentrale extends Model
{
    use HasFactory;
    protected $primaryKey='idsortiecentrale';
    public $timestamps = false;
    protected $fillable = ['idlaptop','quantite','date'];
}
