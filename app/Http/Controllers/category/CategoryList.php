<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\ModelCategory;
use Illuminate\Http\Request;

class CategoryList extends Controller
{
    public function v1(Request $request)
    {
        try {
            $category = ModelCategory::when(request()->q != '', function ($q) {
                $q->where('name', 'LIKE', '%' . request()->q . '%');
            })
            ->orderBy(request('sortby') ?? 'created_at', request('sorttype') ?? 'desc')
            ->paginate(request('paginate') ?? 20);

            return $this->generateResponse($category, "Sucessfully register category", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
