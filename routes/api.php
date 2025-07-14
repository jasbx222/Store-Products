<?php

use App\Http\Controllers\Admin\v1\ProductController;
use App\Http\Controllers\Admin\v1\StoreController;
use App\Http\Controllers\Admin\v1\InventoryController;
use App\Http\Controllers\Admin\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/products', ProductController::class)->middleware('auth:sanctum')->names([
    'index' => 'products.index',
    'show' => 'products.show',
    'store' => 'products.store',
    'update' => 'products.update',
    'destroy' => 'products.destroy',
]);
Route::apiResource('/stores', StoreController::class)->middleware('auth:sanctum')->names([
    'index' => 'stores.index',
    'show' => 'stores.show',
    'store' => 'stores.store',
    'update' => 'stores.update',
    'destroy' => 'stores.destroy',
]);

// ربط منتج بمخزن مع تحديد الكمية
// {
//   "product_id":1,
//   "store_id":1,

//   "quantity":100
// }

Route::post('/product-store/attach', [InventoryController::class, 'attachProductToStore'])->middleware('auth:sanctum');;



// جلب جميع المخازن المرتبطة بمنتج معين
Route::get('/product-store/{product_id}/stores', [InventoryController::class, 'getStoresForProduct'])->middleware('auth:sanctum');;




//{
//   "email": "test@example.com",
//   "password":"jassim"
// }
Route::post('/login', [UserController::class, 'login']);



Route::post('/logout', [UserController::class, 'logout'])->middleware(
    'auth:sanctum'
);
