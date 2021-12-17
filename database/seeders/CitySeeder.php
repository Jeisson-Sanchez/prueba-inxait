<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Service\DataService;

class CitySeeder extends Seeder
{
    private $DataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    /**
     * @author Jeisson Sanchez
     * @return void
     * Metodo que crea las ciudades
     */
    public function run()
    {
        //consume los valores de la api que trae los departamentos y las ciudades
        $data = $this->dataService->search();

        foreach($data as $city){
            
            //valida que el id de la ciudad no este creado
            $searchCity = City::where('id', $city->c_digo_dane_del_municipio)->first();

            if(!$searchCity){
                City::create(['id' => $city->c_digo_dane_del_municipio, 'name' => $city->municipio, 'deparment_id' => $city->c_digo_dane_del_departamento]); 
            }
        }
    }
}
