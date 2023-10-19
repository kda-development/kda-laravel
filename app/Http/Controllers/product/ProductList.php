<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;
use Illuminate\Http\Request;

class ProductList extends Controller
{
    public function v1(Request $request)
    {
        try {
            $product = ModelProduct::when(request()->q != '', function ($q) {
                $q->where('name', 'LIKE', '%' . request()->q . '%');
            })
            ->orderBy(request('sortby') ?? 'created_at', request('sorttype') ?? 'desc')
            ->paginate(request('paginate') ?? 20);

            return $this->generateResponse($product, "Sucessfully get products list", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
