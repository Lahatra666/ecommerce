<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portefeuille extends Model
{
    use HasFactory;
    protected $primaryKey='idportefeuille';
    public $timestamps = false;

    protected $fillable = [
        'iduser',
        'valeur',
        'etat'
    ];

    public function user(){
        return $this->belongsTo(User::class,'iduser');
    }
}
