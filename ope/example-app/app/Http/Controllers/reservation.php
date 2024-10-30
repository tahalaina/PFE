<?php

namespace App\Http\Controllers;

use App\Models\equipement;
use App\Models\etudiant;
use App\Models\maintenance;
use App\Models\reservation as ModelsReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class reservation extends Controller

{

    
    public function index(){
        $equipements= equipement::paginate(2);
        return view('equipement.reservation',compact('equipements'));
    }

   public function store(Request $req){
    $id_utilistaeur =Auth::id();
   $req->validate([
        'equipement_id' => 'required|exists:equipements,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
        'status' => 'required|in:maintenance,reserve',

    ]);
    if ($req->input('status') === 'reserve') {
        ModelsReservation::create([
            'equipement_id' =>  $req->input('equipement_id'),
            'date_debut' =>  $req->input('start_date'),
            'date_fin' => $req->input('end_date') ,
            'etudiant_id' => $id_utilistaeur,
        ]);
          // Récupérer l'équipement par son ID
          $equipement = equipement::where('id', $req->input('equipement_id'))->first();

          // Vérifiez si l'équipement existe
          if (!$equipement) {
              return redirect()->back('index.equipement')->withErrors(['equipement_id' => 'L\'équipement sélectionné n\'existe pas.']);
          }
      

        // Mettre à jour le statut de l'équipement
        $equipement->status = $req->input('status');
        $equipement->save();
    

        return redirect()->route('index.equipement')->with('success', 'equipement  reservé avec succès.');
    }
    if ($req->input('status') === 'maintenance'){
        maintenance::create([
            'equipement_id' =>  $req->input('equipement_id'),
            'date_debut' =>  $req->input('start_date'),
            'date_fin' => $req->input('end_date') ,
            
        ]);
        $equipement = equipement::where('id', $req->input('equipement_id'))->first();

        $equipement->status = $req->input('status');
        $equipement->save();
        return redirect()->route('index.equipement')->with('success', 'equipement mainteance  avec succès.');
    }

    return redirect()->route('index.equipement')->with('danger', "equipement n'est pas plagnifier");




   }

   public function update2(Request $request, $id){
// Valider les données du formulaire si nécessaire
$request->validate([
    'start_date' => 'required|date|after_or_equal:today',
    'end_date' => 'required|date|after:start_date',
  

]);
       // Vérifier si la validation a échoué
if ($request->fails()) {
    // Récupérer les erreurs de validation
    $errors = $request->getMessageBag();

    // Rediriger l'utilisateur vers la page précédente avec les erreurs
    return redirect()->back()->withErrors($errors);
}

// Trouver la réservation correspondante par son ID
$reservation = ModelsReservation::find($id);

// Mettre à jour les attributs de la réservation avec les données du formulaire
$reservation->update([
    'date_debut' => $request->input('start_date'),
    'date_fin' => $request->input('end_date'),
    // Ajoutez d'autres attributs de réservation si nécessaire
]);

// Rediriger l'utilisateur vers une page appropriée après la mise à jour
return redirect()->route('reservation.show');
    }
   



  //mes reservations
   public function show(){
    $id_utilistaeur =Auth::id();
    $etudiant = etudiant::find($id_utilistaeur);
    $reservations = $etudiant->reservations;
 
        
    return view('equipement.mesreserv',compact("reservations"));
   }


   public function historique()
   {
       $equipements = Equipement::orderBy('id', 'desc')->paginate(2);

       $reservations = [];
       $maintenances = [];

       foreach ($equipements as $equipement) {
           $reservations[$equipement->id] = ModelsReservation::where('equipement_id', $equipement->id)->get();
           $maintenances[$equipement->id] = Maintenance::where('equipement_id', $equipement->id)->get();
       }
    

       return view('equipement.historique', compact('equipements', 'reservations', 'maintenances'));
   }

   public function recherche(Request $request)
   {
       $name = $request->input('name');
       $equipements = Equipement::where('name', 'like', "%{$name}%")->paginate(5);

       $reservations = [];
       $maintenances = [];

       foreach ($equipements as $equipement) {
           $reservations[$equipement->id] = ModelsReservation::where('equipement_id', $equipement->id)->get();
           $maintenances[$equipement->id] = Maintenance::where('equipement_id', $equipement->id)->get();
       }

       if($reservations && $maintenances){
       return view('equipement.historique', compact('equipements', 'reservations', 'maintenances'));
   }
   else{
    return redirect()->back()->with('error', 'aucun équipement trouvé');
   }
}



   //annuler reservation
   public function annuler($id)
    {
        $reservation = ModelsReservation::find($id);

        if ($reservation) {
           
            $reservation->delete();
            $equipment = equipement::find($reservation->equipement_id);
            if ($equipment) {
                $equipment->status = 'disponible';
                $equipment->save();
            }

            return redirect()->back();
        }

        return redirect()->back()->with('error', 'La réservation n\'a pas pu être annulée.');
    }



    public function edit($id)
    {
        $reservation = ModelsReservation::find($id);

        if ($reservation) {
            return view('equipement.edit', compact('reservation'));
        }

        return redirect()->route('reservation.show')->with('error', 'Réservation non trouvée.');
    }

   
   
   
    // Méthode pour traiter la soumission du formulaire de modification
    public function update(Request $request, $id)
    {
        $reservation = ModelsReservation::find($id);

        if ($reservation) {
            // Valider les données
            $request->validate([
                'date_debut' => 'required|date|after_or_equal:today',
                'date_fin' => 'required|date|after:start_date',
                
              
                // Ajoutez d'autres règles de validation si nécessaire
            ]);

            // Mettre à jour les données de la réservation
            $reservation->date_debut = $request->input('date_debut');
            $reservation->date_fin = $request->input('date_fin');
            // Ajoutez d'autres champs si nécessaire
            $reservation->save();

            return redirect()->back();
        }

        return redirect()->route('reservation.show')->with('error', 'Réservation non trouvée.');
    }

    public function recherch55(Request $req) {
        $date_reception = $req->input('date_reception');
        $date_expiration = $req->input('date_expiration');
        $name = $req->input('name');
    
        // Recherche de l'équipement par nom
        $equipement = Equipement::where('name', 'like', '%' . $name . '%')->first();
    
        // Vérification si l'équipement a été trouvé
        if (!$equipement) {
            return redirect()->back()->with('error', 'Aucun équipement trouvé');
        }
    
        $id = $equipement->id;
    
        // Recherche des réservations en fonction des critères
        $reservations = ModelsReservation::where(function($query) use ($id, $date_reception, $date_expiration) {
            $query->where('equipement_id', '=', $id);
    
            if ($date_reception) {
                $query->whereDate('date_debut', '=', $date_reception);
            }
            if ($date_expiration) {
                $query->whereDate('date_fin', '=', $date_expiration);
            }
        })->get();
    
        // Vérification si des réservations ont été trouvées
        if ($reservations->isEmpty()) {
            return redirect()->back()->with('error', 'Aucune réservation trouvée');
        }
    
        // Retourne la vue avec les réservations
       
        return view('equipement.mesreserv', compact('reservations'));
    }
    
   
}
