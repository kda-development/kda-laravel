<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\ModelCustomer;
use Illuminate\Http\Request;

class CustomerUpdate extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'id'            => 'required',
                'name'          => 'nullable',
                'phone_number'  => 'nullable',
            ];
            // validate payload
            $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            $customer = ModelCustomer::find(request()->id)->update([
                'name' => request('name'),
                'phone_number' => request('phone_number'),
            ]);
            return $this->generateResponse($customer, "Sucessfully update customer", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
