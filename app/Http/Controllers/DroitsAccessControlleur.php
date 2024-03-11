<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DroitAcces;

class DroitsAccessControlleur extends Controller
{
    public function createDroitAccess(Request $request)
    {
        $request->validate([
            'name_droit' => 'required|string',
            'code' => 'required|string|max:45',

        ]);

        $newDroitAccess = DroitAcces::create([
            'libelle' => $request->input('name_droit'),
            'code' => $request->input('code'),
        ]);

        return redirect()->route('droits-utilisateur')->with('success', 'Droit d\'accès crée avec succès');
    }

    public function showDroitAccess()
    {
        $droitaccess = DroitAcces::all();
        return view('admin.apps.droit-utilisateur', compact('droitaccess'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'code' => 'required|string|max:45',
        ]);
        
        $id_droitacces = $request->input('id_droitacces');
        $droitacces = DroitAcces::find($id_droitacces); 
    
        $droitacces->libelle = $request->input('edit_name_droit');
        $droitacces->code = $request->input('edit_code');



        $droitacces->save();

        // return view('admin.apps.droit-utilisateur', compact('droitaccess'));
        return redirect()->route('create-droit')->with('success', 'Modification réussie');
    }

    public function destroy($id_droitacces)
    {
        $droitaccess = DroitAcces::all();
        $iddroitacces = DroitAcces::findOrFail($id_droitacces);
        $iddroitacces->delete();
        return redirect()->route('droits-utilisateur')->with('success', 'Droit supprimé avec succès');
        // return view('admin.apps.droit-utilisateur', compact('droitaccess'));
    }

}
