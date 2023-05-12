<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $primaryKey='idcategorie';
    public $timestamps = false;

    protected $fillable = ['nomcategorie'];

    public function produits(){
        return $this->hasMany(Produit::class,'idcategorie');
    }
}
