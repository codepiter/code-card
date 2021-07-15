<?php

namespace App\Http\Controllers;

use App\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function destroy($id)
    {
        Reference::find($id)->delete($id);
  
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
}
