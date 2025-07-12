<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Service\products\ProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $service)
    {
        return $this->productService = $service;
    }
    /**
          * @return all products
     */
    // جلب كل المنتجات 
    public function index()
    {
        return $this->productService->index();
        //
    }

    /**
         * @return one product 
     */
    // جلب المنتج منفرد
    public function show(Product $product)
    {
        return $this->productService->show($product);
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    // ظظاضافة منتج جديد 
    public function store(StoreProductRequest $request)
    {
        return $this->productService->store($request->validated());
    }





    /**
         * @return update  product
     */
    //تحيث المنتجات 
    public function update(UpdateProductRequest $request, Product $product)
    {
        return $this->productService->update($request->validated(), $product);
    }

    /**
     *      * @return no contant 
     */
     //حذف المنتج
    public function destroy(Product $product)
    {
        return $this->productService->delete($product);
    }
}
