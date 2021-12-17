<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\{FromCollection, FromView};

class CustomersExport implements FromView
{
    public function __construct($data){
        $this->data = $data;
    }

    public function view(): View
    {
        $customers = $this->data;
        return view('Excel.customers', ['customers' => $customers]);
    }
}
