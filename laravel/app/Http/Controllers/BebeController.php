<?php

namespace App\Http\Controllers;

use App\Models\Bebe;
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
    public function getAll($id = null) {
        if ($id == null) {
            return Bebe::all();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Get all the Bébé by utilisateur.
     *
     * @return Response
     */
    public function getAllByUtilisateur($id_utilisateur = null) {
        if (!empty($id_utilisateur)) {
            return Bebe::whereHas('utilisateurs', function ($query) use ($id_utilisateur) {
                $query->where('utilisateur_bebe.id_utilisateur', '=', $id_utilisateur);
            })->get();
        }
    }

    /**
     * Insert a Bébé
     *
     * @param  Request  $request
     * @return Response
     */
    public function insert(Request $request) {
        $bebe = new Bebe;

        $bebe->nom = $request->input('nom');
        $bebe->prenom = $request->input('prenom');
        $bebe->date_naissance = $request->input('date_naissance');
        $bebe->sexe = $request->input('sexe');
        $bebe->photo = $request->input('photo');
        $bebe->save();

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
