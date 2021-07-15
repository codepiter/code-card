<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

use Auth;

class CustomersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
	           
	
	
    public function model(array $row)
    {
        return new Customer([

			     'personal_information_id'=> Auth::user()->id,
			     'doc_id' => $row[0],
			     'first_name' => $row[1],
				 'last_name' => $row[2],
				 'telephone' => $row[3],
				 'email' => $row[4],
				 'address' => $row[5],
				 //'photo' => $row[7],
		
		]);
    }
}

                 