<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Deparment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\DeparmentController;
use App\Models\Winner;
use Illuminate\Support\Facades\Validator;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    private $DeparmentController;

    public function __construct(DeparmentController $deparmentController)
    {
        $this->deparmentController = $deparmentController;
    }

    /**
     * @author Jeisson Sanchez
     * @return \Illuminate\Http\Response
     * Metodo que muestra el formulario
     */
    public function index()
    {
        $deparments = $this->deparmentController->index();

        return view('form', compact('deparments'));
    }

    /**
     * @author  Jeisson Sanchez
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * metodo para crear un cliente
     */
    public function store(Request $request)
    {
        // dd($request);
        try {
            $deparments = $this->deparmentController->index();

            $validator = Validator::make($request->all(), [
                'name'           => 'required|string',
                'last_name'      => 'required|string',
                'document'       => 'required|integer',
                'deparment_id'   => 'required|integer',
                'city_id'        => 'required|integer',
                'phone'          => 'required|integer',
                'email'          => 'required|string',
                'authorize_data' => 'required',
            ]);

            if($validator->fails()){
                $message = "Todos los campos son obligatorios";
                return view('error', compact('message', 'deparments'));
            }

            $newCustomer = Customer::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'document' => $request->document,
                'deparment_id' => $request->deparment_id,
                'city_id' => $request->city_id,
                'phone' => $request->phone,
                'email' => $request->email,
                'authorize_data' => 1
            ]);

            $message = "Se ha registrado correctamente";
            return view('success', compact('message', 'deparments'));


        } catch (\Exception $e) {
            $message = $e->getMessage();
            return view('error', compact('message', 'deparments'));
        }
    }

    /**
     * @author Jeisson Sanchez
     * Metodo que crea y escoge al cliente ganador
     */
    public function winner()
    {
        $deparments = $this->deparmentController->index();
        $customers = Customer::all();
        $count = sizeof($customers);
        if($count >= 5){
            $updateState = Winner::where('state', 1)->update(['state' => 0]);
            $customerWinner = rand(1, $count);
            $customer = Customer::where('id', $customerWinner)->first();
            $winner = Winner::create([
                'customer_id' => $customerWinner
            ]);
            $message = "Felicidades, El nuevo ganador es: ".$customer->name." ".$customer->last_name;
            return view('success', compact('message', 'deparments'));
        }else{
            $message = "Aun no se puede seleccionar un ganador, minimo deben haberse registrado 5 clientes, la cantidad actual es de: ".$count;
            return view('error', compact('message', 'deparments'));
        }
    }

    /**
     * @author Jeisson Sanchez
     * Metodo que exporta los clientes
     */
    public function export()
    {
        $data = Customer::with('deparment', 'city')->get();
        return Excel::download(new CustomersExport($data), 'Clientes.xlsx');

    }
}
