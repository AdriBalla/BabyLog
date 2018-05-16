<?php

namespace App\Http\Controllers;

use App\Models\Bebe;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class BebeController extends Controller
{
    /**
     * Get the Bébé by Id.
     *
     * @param  int  $id
     * @return Response
     */
    public function getObject($id) {
        return Bebe::find($id);
    }

    /**
     * Get every Bébé.
     *
     * @return Response
     */
    public function getAll() {
        return Bebe::all();
    }

    /**
     * Get every Bébé by utilisateur
     * @param int $id_utilisateur
     *
     * @return Response
     */
    public function getAllByUtilisateur($id_utilisateur=null) {
        if ($id_utilisateur == null) {
            return Bebe::all();
        } else {
            return Bebe::whereHas('utilisateurs', function ($query) use ($id_utilisateur) {
                $query->where('utilisateur_bebe.id_utilisateur', '=', $id_utilisateur);
            })->get();
        }
    }

    /**
     * Insert a Bébé
     *
     * @param  Request  $request
     * @param int $id_utilisateur
     * @return Response
     */
    public function insert(Request $request,$id_utilisateur=null) {
        $bebe = new Bebe;

        $bebe->nom = $request->input('nom');
        $bebe->prenom = $request->input('prenom');
        $bebe->date_naissance = $request->input('date_naissance');
        $bebe->sexe = $request->input('sexe');
        $bebe->photo = $request->input('photo');
        $bebe->save();

        if (!empty($id_utilisateur)){
            Utilisateur::find($id_utilisateur)->bebes()->attach($bebe);
        }

        return $bebe;
    }

    /**
     * Update a Bébé
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $bebe = Bebe::find($id);

        $bebe->nom = $request->input('nom');
        $bebe->prenom = $request->input('prenom');
        $bebe->date_naissance = $request->input('date_naissance');
        $bebe->sexe = $request->input('sexe');
        $bebe->photo = $request->input('photo');
        $bebe->save();

        return $bebe;
    }

    /**
     * Delete a Bébé
     *
     * @param  int  $id
     * @return Response
     */
    public function delete(Request $request,$id) {
        $bebe = Bebe::find($id);

        $bebe->delete();

        return $request->input('id');
    }

}
