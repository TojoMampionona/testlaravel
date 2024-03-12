<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Utilisateur;
use App\Models\DroitAcces;
use App\Models\Personnel;
use App\Models\Profil;
use App\Models\Service;


class UtilisateurController extends Controller
{
    //Methode Affichage Utilisateur
    public function showUserCards()
    {
        $utilisateurs = Utilisateur::all();
        $services = Service::all();
        return view('admin.apps.user-cards', compact('utilisateurs', 'services'));
    }

    //Methode Affichage Formulaire d'enregistrement
    public function showRegistrationForm()
    {
        $listeDesDroitsAcces = DroitAcces::all();
        $listeDesPersonnels = Personnel::all();
        $listeDesProfils = Profil::all();
        $listeDesServices = Service::all();

        return view('admin.apps.register', compact('listeDesDroitsAcces', 'listeDesPersonnels', 'listeDesProfils', 'listeDesServices'));
    }

    //Methode Création d'Utilisateur
    public function createUtilisateur(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string',
            'firstname' => 'required|string|max:45',
            'email' => 'required|string|max:45',
            'service' => 'required|string|max:45',
            'actif' => 'required|integer',
            'date_d_ajout' => 'nullable|date',
            'locked' => 'nullable|integer|',
            'commentaire' => 'nullable|string|max:200',
            'biographie'=> 'nullable|string|max:200',
            'id_profil' => 'nullable|integer',
            'id_personnel'=> 'nullable|integer',
            'pwd' => 'required|string|max:100',
            'date_d_activation' => 'nullable|date',
            'id_droitacces'=> 'nullable|integer',
            'img_pdp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img_pdc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('img_pdp')) {
            $imgPdpPath = $request->file('img_pdp')->store('pdp_images', 'public');
        } else {
            $imgPdpPath = null;
        }

        if ($request->hasFile('img_pdc')) {
            $imgPdcPath = $request->file('img_pdc')->store('pdc_images', 'public');
        } else {
            $imgPdcPath = null;
        }
       
        $newUser = Utilisateur::create([
            'nom' => $request->input('lastname'),
            'prenom' => $request->input('firstname'),
            'email' => $request->input('email'),
            'actif' => $request->input('actif'),
            'service' => $request->input('service'),
            'date_insertion' => $request->input('date_d_ajout'),
            'locked' => $request->has('locked') ? true : false,
            'commentaire' => $request->input('commentaire'),
            'biographie' => $request->input('biographie'),
            'id_profil' => $request->input('id_profil'),
            'id_personnel' => $request->input('id_personnel'),
            'pwd' => $request->input('pwd'),
            'date_locked' => $request->input('date_d_activation'),
            'id_droitacces' => $request->input('id_droitacces'),
            'img_pdp' => $imgPdpPath,
            'img_pdc' => $imgPdcPath,
        ]);

    return redirect()->back()->with('success', 'Utilisateur enregistré');;
    }

    //Methode Modification Utilisateur
    public function edit(Request $request)
    {
        $listeDesDroitsAcces = DroitAcces::all();
        $listeDesPersonnels = Personnel::all();
        $listeDesProfils = Profil::all();
        $listeDesServices = Service::all();

        $id_utilisateur = $request->input('id_utilisateur');
        $utilisateur = Utilisateur::find($id_utilisateur);

        return view('admin.apps.edit-profile', compact('utilisateur', 'listeDesDroitsAcces', 'listeDesPersonnels', 'listeDesProfils', 'listeDesServices'));
    }

    //Methode Modification Utilisateur
    public function update(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string',
            'firstname' => 'required|string|max:45',
            'email' => 'required|string|max:45',
            'service' => 'required|string|max:45',
            'actif' => 'required|integer',
            'date_d_ajout' => 'nullable|date',
            'locked' => 'nullable|integer|',
            'commentaire' => 'nullable|string|max:200',
            'biographie'=> 'nullable|string|max:200',
            'pwd' => 'required|string|max:100',
            'date_d_activation' => 'nullable|date',
            'id_droitacces'=> 'nullable|integer',
            'img_pdp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img_pdc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);
        
        $id_utilisateur = $request->input('id_utilisateur');
        $utilisateur = Utilisateur::find($id_utilisateur);     

        if ($request->hasFile('img_pdp')) {
            $fileName = uniqid() . '.' . $request->file('img_pdp')->getClientOriginalExtension();
            $imgPdpPath = $request->file('img_pdp')->storeAs('public/pdp_images', $fileName);
        } else {
            $imgPdpPath = $utilisateur->img_pdp;
        }
        
        if ($request->hasFile('img_pdc')) {
            $fileName = uniqid() . '.' . $request->file('img_pdc')->getClientOriginalExtension();
            $imgPdcPath = $request->file('img_pdc')->storeAs('public/pdc_images', $fileName);
        } else {
            $imgPdcPath = $utilisateur->img_pdc;
        }
        

        $utilisateur->nom = $request->input('lastname');
        $utilisateur->prenom = $request->input('firstname');
        $utilisateur->email = $request->input('email');
        $utilisateur->service = $request->input('service');
        $utilisateur->actif = $request->input('actif');
        $utilisateur->date_insertion = $request->input('date_d_ajout');
        $utilisateur->locked = $request->has('locked') ? 1 : 0;
        $utilisateur->commentaire = $request->input('commentaire');
        $utilisateur->biographie = $request->input('biographie');
        $utilisateur->pwd = $request->input('pwd');
        $utilisateur->date_locked = $request->input('date_d_activation');
        $utilisateur->id_droitacces = $request->input('id_droitacces');
        $utilisateur->img_pdp = $imgPdpPath;
        $utilisateur->img_pdc = $imgPdcPath;


        $utilisateur->save();

        return redirect()->route('edit-profile', ['id_utilisateur' => $id_utilisateur])->with('success', 'Modification réussie');
    }
    
    //Methode Affichage Utilisateur
    public function destroy($id_utilisateur)
    {
        $utilisateur = Utilisateur::findOrFail($id_utilisateur);
        if ($utilisateur->img_pdp){
            Storage::disk('public')->delete($utilisateur->img_pdp);
        }
        if ($utilisateur->img_pdc){
            Storage::disk('public')->delete($utilisateur->img_pdc);
        }
        $utilisateur->delete();
        return redirect()->route('user-cards')->with('success', 'Utilisateur supprimé avec succès');
    }
    public function toggleLock($id_utilisateur)
    {
        $utilisateur = Utilisateur::find($id_utilisateur);
        if($utilisateur){
            $utilisateur->locked = !$utilisateur->locked;
            $utilisateur->save();
        }
        return redirect()->back();
    }
}
