<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit(){
        $id_utilistaeur =Auth::id();
        $etudiant = etudiant::find($id_utilistaeur);
        return view('profile.edit', compact('etudiant'));
       
    }

    public function update(Request $request)
    {
       
       
        $id_utilisateur = Auth::id();
        $etudiant = etudiant::find($id_utilisateur);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:etudiants,email,' . $etudiant->id,
            'password' => 'nullable|string|min:8|confirmed',
            'titre' => 'nullable|string|max:255',
            'affiliation' => 'nullable|string|max:255',
            'departement' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'domaine_recherche' => 'nullable|string|max:255',
            'formation_doctorale' => 'nullable|string|max:255',
            'specialite' => 'nullable|string|max:255',
            'projets_en_cours' => 'nullable|string|max:500',
            'publications' => 'nullable|string|max:500',
            'competences' => 'nullable|string|max:500',
            'liens_sociaux' => 'nullable|string|max:255',
            'disponibilite' => 'nullable|string|max:255',
            'preferences_contact' => 'nullable|string|max:255',
        ]);
    
        $etudiant->name = $request->name;
        $etudiant->email = $request->email;
        $etudiant->titre = $request->titre;
        $etudiant->affiliation_institutionnelle = $request->affiliation;
        $etudiant->departement = $request->departement;
        $etudiant->numero_telephone = $request->phone;
        $etudiant->domaine_recherche = $request->domaine_recherche;
        $etudiant->formation_doctorale = $request->formation_doctorale;
        $etudiant->specialite  = $request->specialite;
        $etudiant->projets_en_cours = $request->projets_en_cours;
        $etudiant->publications = $request->publications;
        $etudiant->competences_techniques = $request->competences;
        $etudiant->liens_sociaux_academiques = $request->liens_sociaux;
        $etudiant->disponibilite = $request->disponibilite;
        $etudiant->preferences_contact  = $request->preferences_contact;
        
        if ($request->filled('password')) {
            $etudiant->password = bcrypt($request->password);
        }
        
        $etudiant->save();
    
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully'); 
     }
}
