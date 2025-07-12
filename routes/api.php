<?php

use App\Http\Controllers\Admin\v1\ProductController;
use App\Http\Controllers\Admin\v1\StoreController;
use App\Http\Controllers\Admin\v1\InventoryController;
use App\Http\Controllers\Admin\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/products', ProductController::class)->middleware('auth:sanctum');
Route::apiResource('/stores', StoreController::class)->middleware('auth:sanctum');

// ربط منتج بمخزن مع تحديد الكمية
Route::post('/product-store/attach', [InventoryController::class, 'attachProductToStore'])->middleware('auth:sanctum');;

// جلب جميع المخازن المرتبطة بمنتج معين
Route::get('/product-store/{product_id}/stores', [InventoryController::class, 'getStoresForProduct'])->middleware('auth:sanctum');;

Route::post('/login',[UserController::class,'login']);          
Route::post('/logout',[UserController::class,'logout'])->middleware(
'auth:sanctum'
);          