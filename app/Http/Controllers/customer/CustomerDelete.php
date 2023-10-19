<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\ModelCustomer;
use Illuminate\Http\Request;

class CustomerDelete extends Controller
{
    public function v1(Request $request)
    {
        try {
            $customer = ModelCustomer::find(request()->id);
            if($customer){
                $customer->delete();
                return $this->generateResponse($customer, "Sucessfully delete customer", 200);
            }
            return $this->generateResponse($customer, "Customer not found", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
