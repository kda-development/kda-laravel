<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\ModelCustomer;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerStore extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'name'          => 'required',
                'phone_number'  => 'required',
            ];
            // validate payload
            $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            $check = ModelCustomer::where('name', $request->name)->where('phone_number', $request->phone_number)->first();
            if($check){
              return $this->generateResponse(null, "Customer already registered", 400);
            }
            $customer = ModelCustomer::create([
                'name' => request('name'),
                'phone_number' => request('phone_number'),
            ]);
            return $this->generateResponse($customer, "Sucessfully register customer", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
