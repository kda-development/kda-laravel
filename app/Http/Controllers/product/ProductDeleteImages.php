<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;
use App\Models\ModelProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDeleteImages extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'id'             => 'required',
            ];
            // validate payload
            $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            DB::beginTransaction();
            $image = ModelProductImages::where('id', $request->id)->first();
            if(!$image){
              return $this->generateResponse(null, "Product not found", 500);
            }
            $image->delete();
            DB::commit();
            return $this->generateResponse([], "Sucessfully delete product image", 200);
        } catch (\Exception $error) {
            DB::rollback();
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
