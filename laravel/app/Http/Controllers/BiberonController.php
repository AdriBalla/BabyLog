<?php

namespace App\Http\Controllers;

use App\Models\Biberon;
use App\Models\Evenement;
use Illuminate\Http\Request;

class BiberonController extends Controller
{
    /**
     * Get the Biberon by id
     *
     * @param  int  $id
     * @return Response
     */
    public function getObject($id) {
        return $biberons =  Biberon::with('evenement')->find($id);
    }

    /**
     * Get all the Biberon
     *
     * @return Response
     */
    public function getAll($id_bebe=null,$id_utilisateur=null) {
        if (!empty($id_bebe || !empty($id_utilisateur))) {

            $wheres = array();

            if (!empty($id_bebe)){
                $wheres[] = ['id_bebe', '=', $id_bebe];
            }

            if (!empty($id_utilisateur)){
                $wheres[] = ['id_utilisateur', '=', $id_utilisateur];
            }

            return Biberon::whereHas('evenement', function ($query) use ($wheres) {
                $query->where($wheres);
            })->get();
        } else {
            return Biberon::with('evenement')->get();
        }
    }


    /**
     * Insert a Biberon
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $biberon = new Biberon();
        $evenement = new Evenement();

        //On prépare l'évènement
        $evenement->bebe = $request->input('id_bebe');
        $evenement->date_debut = $request->input('date_debut');
        $evenement->date_fin = $request->input('date_fin');
        $evenement->heure_debut = $request->input('heure_debut');
        $evenement->heure_fin = $request->input('heure_fin');
        $evenement->commentaires = $request->input('commentaires');
        $evenement->save();

        //On prépare le biberon
        $biberon->cereales = $request->input('cereales');
        $biberon->quantite_initiale = $request->input('quantite_initiale');
        $biberon->quantite_bue = $request->input('quantite_bue');
        $biberon->evenement = $evenement;

        #On sauvegarde
        $biberon->evenement->save();
        $biberon->id_biberon = $evenement->id_evenement;
        $biberon->save();


        return $biberon;
    }

    /**
     * Update a Biberon
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $biberon = Biberon::with('evenement')->find($id);
        $evenement = $biberon->evenement;

        $biberon->quantite_initiale = $request->input('quantite_initiale');
        $biberon->quantite_bue = $request->input('quantite_bue');
        $biberon->cereales = $request->input('cereales');

        $evenement->date_debut = $request->input('date_debut');
        $evenement->date_fin = $request->input('date_fin');
        $evenement->heure_debut = $request->input('heure_debut');
        $evenement->heure_fin = $request->input('heure_fin');
        $evenement->commentaires = $request->input('commentaires');

        $evenement->save();
        $biberon->save();

        return $biberon;
    }

    /**
     * Delete a Biberon
     *
     * @param  int  $id
     * @return Response
     */
    public function delete(Request $request,$id) {
        $biberon = Biberon::with('evenement')->find($id);

        $biberon->evenement->delete();
        $biberon->delete();

        return $request->input('id');
    }

}
