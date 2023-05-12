<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $primaryKey='idpanier';
    public $timestamps = false;

    protected $fillable = [
        'idproduit',
        'iduser'
    ];
}
