<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\ModelCategory;
use Illuminate\Http\Request;

class CategoryUpdate extends Controller
{
    public function v1(Request $request)
    {
        try {
            $rules = [
                'id'            => 'required',
                'sku'           => 'nullable',
                'code'          => 'nullable',
            ];
            // validate payload
            $request->validate($rules);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 400);
        }

        try {
            $category = ModelCategory::find(request()->id)->update([
                'name' => request('name'),
                'phone_number' => request('phone_number'),
            ]);
            return $this->generateResponse($category, "Sucessfully update category", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
