<?php

namespace App\Http\Controllers;

use App\Models\consomable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class consomablecontroller extends Controller
{
    public function index(){
        $consumables = Consomable::paginate(4);
        return view('consommable.index', compact('consumables'));
    }

    public function create()
    {
        return view('consommable.create');
    }

    public function store(Request $request)
    {
        $id_utilistaeur =Auth::id();
     $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fabricant' => 'required|string|max:255',
            'date_reception' => 'required|date|after_or_equal:today',
            'date_expiration' => 'required|date|after:start_date',]);

        // Handle file upload
       /* if ($request->hasFile('fds')) {
            $file = $request->file('fds');
            $path = $file->store('fds', 'public');
            $validatedData['fds'] = $path;
        }*/

        consomable::create([
            'etudiant_id' => $id_utilistaeur,
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'fabricant' => $request->input('fabricant'),
            'date_reception'=>$request->input('date_reception'),
            'date_expiration' => $request->input('date_expiration'),
            'etudiant_id' => $id_utilistaeur,
            ]);
     
        return redirect()->route('consomable')->with('success', 'Consumable ajoute successfully.');
    }

    public function destroy($id){
        $consomable = consomable::find($id);
        $consomable->delete();
        return redirect()->route('consomable')->with('success', 'Consumable  supprimé successfully.');
    }

    public function recheche(Request $req){
        $name = $req->input('name');
        $type = $req->input('type');
        $date_reception = $req->input('date_reception');
        $date_expiration = $req->input('date_expiration');
    
        $consumables = Consomable::where(function($query) use ($name, $type, $date_reception, $date_expiration) {
            if ($name) {
                $query->where('name', 'like', "%$name%");
            }
            if ($type) {
                $query->where('type', 'like', "%$type%");
            }
            if ($date_reception) {
                $query->whereDate('date_reception', '=', $date_reception);
            }
            if ($date_expiration) {
                $query->whereDate('date_expiration', '=', $date_expiration);
            }
        })->get();
   
   
   
   
   
   if($consumables){
   return view('consommable.index', compact('consumables'));
    }else{
        return redirect()->back()->with('error', 'aucun consomable trouvé');
    }
}
}
