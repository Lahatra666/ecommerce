<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey='idadmin';
    public $timestamps = false;

    use HasFactory;
    protected $fillable = ['emailadmin', 'mdpadmin'];
}
