<?php

namespace App\Http\Controllers;

use App\Mail\forgetemail;
use App\Mail\inscriptionmail;
use App\Models\chercheur;
use App\Models\etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class logincontroller extends Controller
{
    public function show(){
       
      // Mail::to('lainamohemedtaha@gmail.com')->send(new inscriptionmail());
        return view('login.login');
    }
    public function login(Request $req){
        
      
        $login = $req->email;
        $passwrd =$req->password;
        $values =["email" =>$login,"password"=>$passwrd];
       
       if(Auth::attempt($values)){
        $user = Auth::user();

       //    if($user->titre !== "" && $user->numero_telephone !== ""){   
             $req->session()->regenerate();
             session()->flash('success', 'Bienvenue, ' . $user->name . ' !');

             return redirect()->route('home');}
          //   else {
          //    $message = 'Monsieur, ' . $user->name . '! vous devez d abord completer votre profile';
          //    return redirect()->route('inscrire.form')->with('danger', $message);
           //  }
       //}
       else{
             return back()->withErrors(['password' => 'Le mot de passe est incorrect'])->onlyInput('adresse_email');
      }
      
    }
    public function logout(){
       

            Session::flush();
            Auth::logout();
            return  to_route('show')->with('success', 'vous etes bien deconnecter');
        
    }
    public function forget(){
      return view('login.forgetpassword');
    }

    public function sendforget(Request $req){
 $users= etudiant::where('email','=',$req->email)->first();
   if(!empty($users)){
     
   }else{
    return  to_route('forget')->with('danger', 'l eamil nexist pas');
   }
    }
}
