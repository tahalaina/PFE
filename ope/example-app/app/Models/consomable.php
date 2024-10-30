<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consomable extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'conditionnement',
        'type',
        'description',
        'fabricant',
        'numero_lot',
        'date_reception',
        'date_expiration',
        'quantite',
        'conditions_stockage',
        'fournisseur',
        'emplacement_stockage',
        'fds',
        'utilisation_prevue',
        'categorie_utilisation',
        'procedures_elimination',
        'etudiant_id',
    ];
    public function user()
    {
        return $this->belongsTo(etudiant::class);
    }
}
