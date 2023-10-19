<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\ModelCustomer;
use Illuminate\Http\Request;

class CustomerList extends Controller
{
    public function v1(Request $request)
    {
        try {
            $customer = ModelCustomer::when(request()->q != '', function ($q) {
                $q->where('name', 'LIKE', '%' . request()->q . '%');
            })
            ->orderBy(request('sortby') ?? 'created_at', request('sorttype') ?? 'desc')
            ->paginate(request('paginate') ?? 20);

            return $this->generateResponse($customer, "Sucessfully register customer", 200);
        } catch (\Exception $error) {
            return $this->generateResponse(null, $error->getMessage(), 500);
        }
    }
}
