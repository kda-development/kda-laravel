<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;
use App\Models\ModelProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAddImages extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'product_sku'     => 'required',
                'image'           => 'required',
            ];
            // validate payload
            $payload = $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            DB::beginTransaction();
            $check = ModelProduct::where('sku', $request->sku)->first();
            if(!$check){
              return $this->generateResponse(null, "Product not found", 500);
            }

            ModelProductImages::create($payload);

            DB::commit();
            return $this->generateResponse([], "Sucessfully update product category", 200);
        } catch (\Exception $error) {
            DB::rollback();
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
