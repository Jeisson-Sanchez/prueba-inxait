<?php

namespace App\Service;

use App\Traits\RequestService;
use Exception;

class DataService
{
    use RequestService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('app.deparmentCity');
        if(empty($this->baseUri)) throw new Exception('Configuracion incompleta, pendiente variable "URL_API_DEPARMET_CITY" en Env', 1);
    }

    /** 
     * @author Jeisson Sanchez
     * Metodo que hace el consumo de la api de las ciudades y 
     * departamentos para la creacion de los seeder
     */
    public function search(){
        return $this->request('GET', $this->baseUri);        
    }
}