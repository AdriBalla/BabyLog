<?php

namespace App\Http\Controllers;

use App\Models\Biberon;
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
        return Biberon::find($id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Biberon::all();
        } else {
            return $this->show($id);
        }
    }

}
