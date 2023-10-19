<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\ModelTransactionProductCart;
use Illuminate\Http\Request;

class CustomerCartOrder extends Controller
{
    public function v1(Request $request)
    {
        try {
            $orders = ModelTransactionProductCart::where("is_active", "1")->where("customer_id", auth()->user()->id)->get();
            if(count($orders)){
                dd("Aaa");
            }else{
                dd("bbb");
            }
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
