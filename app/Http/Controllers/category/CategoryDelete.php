<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\ModelCategory;
use Illuminate\Http\Request;

class CategoryDelete extends Controller
{
    public function v1(Request $request)
    {
        try {
            $category = ModelCategory::find(request()->id);
            if($category){
                $category->delete();
                return $this->generateResponse($category, "Sucessfully delete category", 200);
            }
            return $this->generateResponse($category, "Category not found", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
