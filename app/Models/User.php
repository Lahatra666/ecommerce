<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Portefeuille;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    use HasFactory;

    protected $primaryKey='iduser';

    protected $fillable = [
        'nameuser',
        'emailuser',
        'mdpuser',
    ];

    public $timestamps = false;
    public function portefeuille(){
        return $this->hasOne(Portefeuille::class,'iduser');
    }

}
