<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = ['equipement_id', 'etudiant_id','date_debut','date_fin'];
 

    public function equipements()
    {
        return $this->belongsTo(equipement::class);
    }

    public function etudiants()
    {
        return $this->belongsTo(etudiant::class);
    }
   
}
