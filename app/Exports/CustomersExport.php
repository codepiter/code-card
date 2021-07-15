<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Auth;

class CustomersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
		$id_user = auth()->id();
        // return Customer::all();
		 return Customer::where('personal_information_id', $id_user)->first();
    }
}
