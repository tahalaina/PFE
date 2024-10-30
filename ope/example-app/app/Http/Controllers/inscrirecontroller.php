<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class inscrirecontroller extends Controller
{
    public function show(){
           return view('inscrire.inscrire');
    }

    
    public function create(Request $req){

        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:etudiants,email,',
            'password' => 'nullable|string|min:8|',
        ]);
        etudiant::create([
            'name' => $req->input('name'),
            'prenom' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => bcrypt($req->input('password')),
        ]);
        $values =["email" =>$req->input('email'),"password"=>$req->input('password')];
        Auth::attempt($values);
        $user = Auth::user();
        return view('inscrire.formprofile')->with('success', 'Termine votre profile !!');
    
    }

    

    public function edit(Request $req,$id){
 $etudiant=etudiant::find($id);
    $etudiant->update([
            'titre'=>$req->input('titre'),
            'affiliation_institutionnelle'=>$req->input('affilation'),    'departement'=>$req->input('departement'),
            'numero_telephone'=>$req->input('phone'),    'domaine_recherche'=>$req->input('Domaine'),
            'formation_doctorale'=>$req->input('Formation'),    'specialite'=>$req->input('Specialite'),

            'competences_techniques'=>$req->input('Compet'), 'liens_sociaux_academiques'=>$req->input('liens'),
            'preferences_contact'=>$req->input('Preferences'),
    ]);
    
    session()->flash('success', 'Bienvenue, ' . $etudiant->name . ' !');
    return redirect()->route('home');
    }

}
