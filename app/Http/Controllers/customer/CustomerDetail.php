<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\ModelCustomer;
use Illuminate\Http\Request;

class CustomerDetail extends Controller
{
    public function v1(Request $request)
    {
        try {
            $customer = ModelCustomer::where('name', $request->name)->first();
            return $this->generateResponse($customer, "Sucessfully get detail customer", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
