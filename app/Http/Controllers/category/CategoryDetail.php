<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\ModelCategory;
use Illuminate\Http\Request;

class CategoryDetail extends Controller
{
    public function v1(Request $request)
    {
        try {
            $category = ModelCategory::where('name', $request->name)->first();
            return $this->generateResponse($category, "Sucessfully get detail category", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
