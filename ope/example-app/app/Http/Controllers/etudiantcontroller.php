<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use App\Models\reservation;
use Illuminate\Http\Request;

class etudiantcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $etudiants = etudiant::paginate(10);
    return view('etudiants.utilisateurs',compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etudiant.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:etudiants,email,',
            'password' => 'nullable|string|min:8|confirmed',
          
        ]);
        etudiant::create([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('etudiant')->with('success', 'Étudiant ajouté avec succès.');
    
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(etudiant $etudiant)
    {     
       
        return view('etudiant.mofifier',compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
            'numero_telephone' => 'nullable|string|max:20',
            'departement' => 'nullable|string|max:255',
            'disponibilite' => 'nullable|string|max:255',
        ]);

        $etudiant=etudiant::find($id);
        $etudiant->email = $request->input('email');
        $etudiant->password = bcrypt($request->input('password'));
        $etudiant->numero_telephone = $request->input('numero_telephone');
        $etudiant->departement = $request->input('departement');
        $etudiant->disponibilite = $request->input('disponibilite');
        if ($request->filled('password')) {
            $etudiant->password = bcrypt($request->input('password'));
        }
        $etudiant->save();

        return redirect()->route('profile.edit')->with('success', 'Étudiant modifié avec succès.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $etudiant=etudiant::find($id);
        $reservation= reservation::where('etudiant_id', $id)->first();
        if($reservation){
      $reservation->delete();
       $etudiant->delete();
       return redirect()->route('utiliosateur.index')->with('success', 'Étudiant supprimé avec succès.');
    }
    $etudiant->delete();
 return redirect()->route('utiliosateur.index')->with('success', 'Étudiant supprimé avec succès.');
  
    }
}
