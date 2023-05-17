<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $primaryKey='idlaptop';
    public $timestamps = false;

    protected $fillable = ['nomlaptop','prix','reference','idmarque','idprocesseur','ram','dur','image'];

}
