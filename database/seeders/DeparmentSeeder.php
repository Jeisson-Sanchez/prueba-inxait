<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deparment;
use App\Service\DataService;

class DeparmentSeeder extends Seeder
{
    private $DataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    /**
     * @author Jeisson Sanchez
     * @return void
     * Metodo que crea los departamentos
     */
    public function run()
    {
        //consume los valores de la api que trae los departamentos y las ciudades
        $data = $this->dataService->search();

        foreach($data as $deparment){
            
            //valida que el id del departamento no este creado
            $searchDeparment = Deparment::where('id', $deparment->c_digo_dane_del_departamento)->first();

            if(!$searchDeparment){
                Deparment::create(['id' => $deparment->c_digo_dane_del_departamento, 'name' => $deparment->departamento]); 
            }
        }
    }
}
