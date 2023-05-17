<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    protected $primaryKey='idmagasin';
    public $timestamps = false;

    use HasFactory;
    protected $fillable = ['nommagasin','lieu'];
}
