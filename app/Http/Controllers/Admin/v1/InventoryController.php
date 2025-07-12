<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // إضافة أو تحديث كمية منتج في مخزن معين
    public function attachProductToStore(InventoryRequest $request)
    {
        $request->validated();

        $product = Product::findOrFail($request->product_id);

        // attach إذا ما موجود، أو updatePivot إذا موجود
        $product->stores()->syncWithoutDetaching([
            $request->store_id => ['quantity' => $request->quantity]
        ]);

        return response()->json(['message' => 'تم ربط المنتج بالمخزن بنجاح']);
    }

    // جلب كل المخازن المرتبطة بمنتج
    public function getStoresForProduct($product_id)
    {
        $product = Product::with('stores')->findOrFail($product_id);

        return response()->json($product->stores->map(function ($store) {
            return [
                'store_id' => $store->id,
                'store_name' => $store->name,
                'quantity' => $store->pivot->quantity,
            ];
        }));
    }
}
