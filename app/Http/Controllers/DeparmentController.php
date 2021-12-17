<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deparment;

class DeparmentController extends Controller
{
    /**
     * @author Jeisson Sanchez
     * @return \Illuminate\Http\Response
     * Metodo que trae todas los departamentos
     */
    public function index()
    {
        $deparments = Deparment::all();
        return $deparments;
    }
}
