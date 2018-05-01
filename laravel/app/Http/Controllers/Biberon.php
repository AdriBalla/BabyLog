<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Biberon extends Controller
{
    /**
     * Display the specified Biberon.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Biberon::find($id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Biberon::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

}
