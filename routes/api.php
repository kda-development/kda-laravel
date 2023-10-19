<?php

use App\Http\Controllers\auth\Login;
use App\Http\Controllers\auth\Logout;
use App\Http\Controllers\auth\Profile;
use App\Http\Controllers\auth\Register;
use App\Http\Controllers\customer\CustomerCartOrder;
use App\Http\Controllers\customer\CustomerCartStore;
use App\Http\Controllers\customer\CustomerDelete;
use App\Http\Controllers\customer\CustomerDetail;
use App\Http\Controllers\customer\CustomerList;
use App\Http\Controllers\customer\CustomerStore;
use App\Http\Controllers\customer\CustomerUpdate;
use App\Http\Controllers\product\ProductNonActived;
use App\Http\Controllers\product\ProductAddCategory;
use App\Http\Controllers\product\ProductAddImages;
use App\Http\Controllers\product\ProductDeleteImages;
use App\Http\Controllers\product\ProductDetail;
use App\Http\Controllers\product\ProductList;
use App\Http\Controllers\product\ProductStore;
use App\Http\Controllers\product\ProductUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("login", [Login::class, "v1"]);
Route::post("register", [Register::class, "v1"]);

Route::middleware(['auth:api'])->group(function () {
    Route::post("profile", [Profile::class, "v1"]);
    Route::post("logout", [Logout::class, "v1"]);

    Route::prefix('customer')
    ->group(function () {
        Route::get("list", [CustomerList::class, "v1"]);
        Route::post("store", [CustomerStore::class, "v1"]);
        Route::post("update", [CustomerUpdate::class, "v1"]);
        Route::get("detail", [CustomerDetail::class, "v1"]);
        Route::delete("delete", [CustomerDelete::class, "v1"]);
    });

    Route::prefix('product')
    ->group(function () {
        Route::get("list", [ProductList::class, "v1"]);
        Route::post("store", [ProductStore::class, "v1"]);
        Route::post("update", [ProductUpdate::class, "v1"]);
        Route::get("detail", [ProductDetail::class, "v1"]);
        Route::post("non-activated", [ProductNonActived::class, "v1"]);
        Route::post("bulk-category", [ProductAddCategory::class, "v1"]);
        Route::post("add-images", [ProductAddImages::class, "v1"]);
        Route::delete("delete-images", [ProductDeleteImages::class, "v1"]);
    });

    Route::prefix('cart')
    ->group(function () {
        Route::post("store", [CustomerCartStore::class, "v1"]);
        Route::post("order", [CustomerCartOrder::class, "v1"]);
    });

});
