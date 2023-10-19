<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;
use Illuminate\Http\Request;

class ProductStore extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'name'              => 'required',
                'sku'               => 'required',
                'merchant_code'     => 'required',
                'price_original'    => 'required',
                'price_discount'    => 'required',
                'slug'              => 'required',
                'desc'              => 'required',
                'highlight'         => 'required',
                'thumbnail'         => 'required',
                'stock'             => 'nullable',
                'is_out_of_stock'   => 'required',
                'is_infinity_stock' => 'required',
                'is_active'         => 'required',
            ];
            // validate payload
            $payload = $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            $check = ModelProduct::where('sku', $request->sku)->first();
            if($check){
              return $this->generateResponse(null, "Product already registered", 400);
            }
            $product = ModelProduct::create($payload);
            return $this->generateResponse($product, "Sucessfully register product", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
