<?php

namespace App\Http\Controllers;

use App\Models\Bebe;
use Illuminate\Http\Request;

class BebeController extends Controller
{
    /**
     * Display the specified Biberon.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Bebe::find($id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Bebe::all();
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $bebe = Bebe::find($request->input('id'));

        $bebe->delete();

        return $request->input('id');
    }

}
