<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory; 
    protected $primaryKey='idproduit';
    public $timestamps = false;
    protected $fillable = ['nomproduit','idcategorie','prix','detail','image'];
    
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function stock(){
        return $this->hasOne(Stock::class,'idproduit');
    }
}
