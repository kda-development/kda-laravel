<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\ModelCategory;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryStore extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'code'          => 'required',
                'sku'           => 'required',
            ];
            // validate payload
            $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            $check = ModelCategory::where('name', $request->name)->where('phone_number', $request->phone_number)->first();
            if($check){
              return $this->generateResponse(null, "Category already registered", 400);
            }
            $category = ModelCategory::create([
                'name' => request('name'),
                'phone_number' => request('phone_number'),
            ]);
            return $this->generateResponse($category, "Sucessfully register category", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
