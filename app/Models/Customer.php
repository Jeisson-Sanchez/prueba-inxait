<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";
    protected $fillable = [
        'id',
        'name',
        'last_name',
        'document',
        'deparment_id',
        'city_id',
        'phone',
        'email',
        'authorize_data',
        'state'
    ];

    /**
     * @author Jeisson Sanchez
     * Relacion con departamentos
     */
    public function deparment(){
        return $this->belongsTo(Deparment::class, 'deparment_id', 'id');
    }

    /**
     * @author Jeisson Sanchez
     * Relacion con las ciudades
     */
    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
