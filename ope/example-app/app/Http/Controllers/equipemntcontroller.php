<?php

namespace App\Http\Controllers;

use App\Models\equipement;
use App\Models\etudiant;
use App\Models\maintenance;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class equipemntcontroller extends Controller
{
    
  
    
    
    /**
     * 
     * 
     * Display a listing of the resource.
     */
   
    public function index(){  
        $equipements= equipement::paginate(10);
        return view('equipement.adminequipment',compact('equipements'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $status = $request->input('status');

        $equipments2 = equipement::query();

        if ($query) {
            $equipments2 = $equipments2->where('name', 'like', '%' . $query . '%');
        }

        if ($status) {
            $equipments2 = $equipments2->where('status', $status);
        }

        $equipments2 = $equipments2->get();
        $equipements= equipement::paginate(10);
        return view('equipement.adminequipment', compact('equipments2','equipements'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'modele' => 'required|int',
            'type' => 'required|string|max:255',
            'current-status' => 'nullable|string',
            'equipment-description' => 'nullable|string',
            'manufacturer' => 'nullable|string',
            'serial-number' => 'nullable|string',
            'purchase-date' => 'nullable|date',
            'supplier' => 'nullable|string',
            'location' => 'nullable|string',
            'next-calibration' => 'nullable|date',
            'safety-precautions' => 'nullable|string',
            'required-training' => 'nullable|string',
            'usage-instructions' => 'nullable|string',
            'warranty-info' => 'nullable|string',
        ]);
        equipement::create([
            'name' => $request->input('name'),
            'modele' => $request->input('modele'),
            'type' => $request->input('type'),
            'status' =>$request->input('current-status'),
            'description' =>$request->input('equipment-description'),
            'fabricant' =>$request->input('manufacturer'),
            'numero_serie' =>$request->input('serial-number'),
            'date_achat ' =>$request->input('purchase-date'),
            'fournisseur' =>$request->input('supplier'),
            'emplacement' =>$request->input('location'),
            'date_prochaine_calibration' =>$request->input('next-calibration'),
           
            'precautions_securite' =>$request->input('safety-precautions'),
            'formation_requise' =>$request->input('required-training'),
            'instructions_utilisation' =>$request->input('usage-instructions'),
            'informations_garantie' =>$request->input('warranty-info'),
        ]);

        return redirect()->route('index.equipement')->with('success', 'Equipement ajouté avec succès.');
    
    
    }


   
    /**
     * Display the specified resource.
     */
    public function plus($id)
    {
        $equipement = equipement::find($id);
        return view('equipement.show', compact('equipement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    
        $equipement = equipement::find($id);
        return view("equipement.editequip",compact('equipement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $equipment = equipement::find($id);
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'modele' => 'required|int',
            'type' => 'required|string|max:255',
            'status' => 'nullable|string',
            'equipment-description' => 'nullable|string',
            'manufacturer' => 'nullable|string',
            'serial-number' => 'nullable|string',
            'purchase-date' => 'nullable|date',
            'supplier' => 'nullable|string',
            'location' => 'nullable|string',
            'next-calibration' => 'nullable|date',
            'safety-precautions' => 'nullable|string',
            'required-training' => 'nullable|string',
            'usage-instructions' => 'nullable|string',
            'warranty-info' => 'nullable|string',
        ]);

        $equipment->update([
            'name' => $request->input('name'),
            'modele' => $request->input('modele'),
            'type' => $request->input('type'),
            'description' => $request->input('equipment-description'),
            'fabricant' => $request->input('manufacturer'),
            'numero_serie' => $request->input('serial-number'),
            'date_achat' => $request->input('purchase-date'),
            'fournisseur' => $request->input('supplier'),
            'emplacement' => $request->input('location'),
            'date_prochaine_calibration' => $request->get('next-calibration'),
            'precautions_securite' => $request->get('safety-precautions'),
            'formation_requise' => $request->get('required-training'),
            'informations_garantie' => $request->get('warranty-info'),
        ]);
        return redirect()->route('equipement')->with('success', 'Équipement mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        $equipement= equipement::find($id);
        if($equipement){
                  $reservation = reservation::find($id);
                  $maintance = maintenance::find($id);
                  if($reservation){
                    $reservation->delete();
                    $equipement->delete();
                    return redirect()->back();
                  }
                  if($maintance){
                    $maintance->delete();
                    $equipement->delete();
                    return redirect()->back();
                  }
                  $equipement->delete();
                  return redirect()->back();
        }
        return redirect()->back()->with('error', 'La réservation n\'a pas pu être annulée.');

    }

    public function plagnifier($id)
    {
        $equipement = Equipement::findOrFail($id);
        return view('equipement.plagnifier', compact('equipement'));
    }


    public function plagnifierexecute(Request $request,$id)
    {
        $validatedData  = $request->validate([
            'event' => 'required|in:reservation,maintenance',
            'debut' => 'required|date|after_or_equal:today',
            'fin' => 'required|date|after:debut'
        ]);

       
        if ($validatedData['event'] === 'reservation') {
        $existingReservation = reservation::where('equipement_id', $id)
        ->whereBetween('date_debut', [$request->input('debut'), $request->input('fin')])
        ->orWhereBetween('date_fin', [$request->input('debut'), $request->input('fin')])
        ->exists();

if ($existingReservation) {
return redirect()->route('plagnifier',$id)
->with('danger', 'Il y a déjà une réservation pour cette période.');
}

// Créer la nouvelle réservation
$reservation = reservation::create([
'equipement_id' => $id,
'etudiant_id' => auth()->id(),
'date_debut' => $request->input('debut'),
'date_fin' => $request->input('fin')
]);
$equipement=equipement::find($id);
$equipement->status = 'reserve';
$equipement->save();


return redirect()->route('equipement')
->with('success', 'La réservation a été créée avec succès.');
       }elseif ($validatedData['event'] === 'maintenance') {
        // Traiter la maintenance
        $maintenance = maintenance::create([
            'equipement_id' => $id,
            'date_debut' => $validatedData['debut'],
            'date_fin' => $validatedData['fin'],
        ]);
        $maintenance->save();
        $equipement=equipement::find($id);
        $equipement->status = 'maintenance';
         $equipement->save();

        return redirect()->back()->with('success', 'Maintenance ajoutée avec succès.');
    }
  }
  

}
