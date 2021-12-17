<?php

namespace App\Traits;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

trait RequestService 
{
    /**
     * @author Jeisson Sanchez
     * Metodo que hace la conexion con las apis
     */
    public function request($method, $requestUri)
    {
        try{
            
            $client = new Client([
                'base_uri' => $this->baseUri
            ]);

            $reponse = $client->request($method, $requestUri);

            $data = json_decode($reponse->getBody()->getContents());

            return $data;

        }catch(RequestException $e){
            throw new Exception($e->getResponse()->getBody(true), 1);
        }
    }
}