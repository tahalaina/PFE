<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    use HasFactory;
  
    protected $fillable =['name', 'prenom','email', 'password'];

    public function reservations()
    {
        return $this->hasMany(reservation::class);
    }
    public function consumables()
    {
        return $this->hasMany(consomable::class);
    }
   
}
