<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintenance extends Model
{
    use HasFactory;
    
    protected $fillable = ['equipement_id','date_debut','date_fin','description'];

    public function equipement()
    {
        return $this->belongsTo(equipement::class);
    }
}
