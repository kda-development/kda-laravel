<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;
use Illuminate\Http\Request;

class ProductUpdate extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'sku'               => 'required',
                'name'              => 'nullable',
                'merchant_code'     => 'nullable',
                'price_original'    => 'nullable',
                'price_discount'    => 'nullable',
                'slug'              => 'nullable',
                'desc'              => 'nullable',
                'highlight'         => 'nullable',
                'thumbnail'         => 'nullable',
                'stock'             => 'nullable',
                'is_out_of_stock'   => 'nullable',
                'is_infinity_stock' => 'nullable',
                'is_active'         => 'nullable',
            ];
            // validate payload
            $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            $product = ModelProduct::where('sku', request()->sku)->first();
            if(!$product){
                return $this->generateResponse(null, 'Product no found', 500);
            }
            $product->update([
                'name' => request()->name,
                'sku' => request()->sku,
                'merchant_code' => request()->merchant_code,
                'price_original' => request()->price_original,
                'price_discount' => request()->price_discount,
                'slug' => request()->slug,
                'desc' => request()->desc,
                'highlight' => request()->highlight,
                'thumbnail' => request()->thumbnail,
                'stock' => request()->stock,
                'is_out_of_stock' => request()->is_out_of_stock,
                'is_infinity_stock' => request()->is_infinity_stock,
                'is_active' => request()->is_active,
            ]);
            return $this->generateResponse($product, "Sucessfully update product", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
