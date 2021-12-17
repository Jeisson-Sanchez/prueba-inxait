<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{   
    /**
     * @author Jeisson Sanchez
     * Metodo que muestra las ciudades segun el departamento
     */
    public function show(Request $request)
    {
        if($request->ajax()){
            $cities = City::where('deparment_id', $request->deparment)->get();
            foreach($cities as $city){
                $citiesArray[$city->id] = $city->name;
            }
            return response()->json($citiesArray);
        }
    }
}
