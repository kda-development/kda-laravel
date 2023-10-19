<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;
use Illuminate\Http\Request;

class ProductNonActived extends Controller
{
    public function v1(Request $request)
    {
        try {
            $product = ModelProduct::where('sku', request()->sku)->first();
            if($product){
                $product->update([
                    'is_active' => '0'
                ]);
                return $this->generateResponse($product, "Sucessfully non-activated product", 200);
            }
            return $this->generateResponse($product, "Product not found", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
