<?php

namespace App\Http\Controllers;

use App\Mail\usermaill;
use App\Models\consomable;
use App\Models\equipement;
use App\Models\etudiant;
use App\Models\maintenance;
use App\Models\reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class homecontroller extends Controller
{    
    public function index()
    {
        $equipements = Equipement::all();
        $consommables = Consomable::all();
        $etudiants = etudiant::all();
        $disponibles = $equipements->count();
        $consommablesCount = $consommables->count();
        $etudiantsCount = $etudiants->count();
        $id=Auth::id();
        $utilisateur=etudiant::find($id);


        $reservations = Reservation::where('etudiant_id', $id)->get();
        foreach ($reservations as $reservation) {
            if (now()->greaterThan($reservation->date_fin)) {
                $equipment = equipement::find($reservation->equipement_id);
                if ($equipment) {
                    $equipment->status = 'disponible'; // Assuming you have a 'status' column in your equipment table
                    $equipment->save();
                }
            }
        }
        $maintenances = maintenance::all();
        foreach ($maintenances as $maintenance) {
            if (now()->greaterThan($maintenance->date_fin)) {
                $equipment = Equipement::find($maintenance->equipement_id);
                if ($equipment) {
                    $equipment->status = 'disponible'; // Mettre à jour le statut de l'équipement à 'disponible'
                    $equipment->save();
                }
            }
        }
    
        $chartData = [
            'labels' => ['Équipements', 'Consommables', 'Étudiants'],
            'datasets' => [
                [
                    'label' => 'Quantité',
                    'backgroundColor' => ['rgba(75, 192, 192, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    'borderColor' => ['rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)', 'rgba(54, 162, 235, 1)'],
                    'borderWidth' => 1,
                    'data' => [$disponibles, $consommablesCount, $etudiantsCount]
                ]
            ]
        ];

        $reservations = Reservation::where('etudiant_id', $id)->get();
    
        return view('hom', compact('chartData','reservations'));
        
     
        
    }
}
