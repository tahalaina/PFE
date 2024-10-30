<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'status', 'type', 'modele', 'description', 'fabricant', 'numero_serie',
        'date_achat', 'fournisseur', 'emplacement', 'date_prochaine_calibration',
        'precautions_securite', 'instructions_utilisation', 'formation_requise', 'informations_garantie'
    ];
    public function reservations()
    {
        return $this->hasMany(reservation::class);
    }
    public function maintenances()
    {
        return $this->hasMany(maintenance::class);
    }
   
}
