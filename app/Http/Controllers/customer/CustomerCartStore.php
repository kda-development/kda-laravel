<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\ModelTransactionProductCart;
use Illuminate\Http\Request;

class CustomerCartStore extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'product_sku'         => 'required',
                'qty'                 => 'required',
                'price'               => 'required',
                'total_price'         => 'required',
            ];
            // validate payload
            $payload = $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            $payload['customer_id'] = auth()->user()->id;
            $customer = ModelTransactionProductCart::create($payload);
            return $this->generateResponse($customer, "Sucessfully add to cart", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
