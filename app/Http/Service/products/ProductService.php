<?php
namespace App\Http\Service\products;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService
{

    //get all products
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    // get the product with the stores 

    public function show($product)
    {
        return new ProductResource($product);
    }



    // add new product to our system 
    public function store(array $data)
    {

        $product = Product::create($data);
       return new ProductResource($product);
    }



    //update the prod ucts 


    public function update(array $data, $product)
    {
        $product->update($data);
       return new ProductResource($product);
    }


    //delete the products 

    public function delete($product)
    {

        $product->delete();
        return  response()->noContent();
    }
}
