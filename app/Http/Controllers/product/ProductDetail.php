<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;
use Illuminate\Http\Request;

class ProductDetail extends Controller
{
    public function v1(Request $request)
    {
        try {
            $product = ModelProduct::where('name', $request->name)->first();
            return $this->generateResponse($product, "Sucessfully get detail product", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
