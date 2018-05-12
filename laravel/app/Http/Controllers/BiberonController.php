<?php

namespace App\Http\Controllers;

use App\Models\Biberon;
use App\Models\Evenement;
use Illuminate\Http\Request;

class BiberonController extends Controller
{
    /**
     * Display the specified Biberon.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return $biberons =  Biberon::with('evenement')->find($id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Biberon::with('evenement')->get();
        } else {
            return $this->show($id);
        }
    }


    /**
     * Store a newly created resource in storage.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request,$id) {
        $biberon = Biberon::with('evenement')->find($id);

        $biberon->evenement->delete();
        $biberon->delete();

        return $request->input('id');
    }

}
