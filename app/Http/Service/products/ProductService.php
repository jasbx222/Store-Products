<?php



namespace App\Http\Service\products;

use App\Models\Product;

use function PHPUnit\Framework\returnSelf;

class ProductService
{

    //get all products
    public function index()
    {
        return response()->json(Product::all());
    }

    // get the product with the stores 

    public function show($product)
    {
        return response()->json([
            'products' => $product,
            'store' => $product->stores
        ]);
    }



    // add new product to our system 
    public function store(array $data)
    {

        $products = Product::create($data);
        return  response()->json([
            'product' => $products
        ], 201);
    }



    //update the prod ucts 


    public function update(array $data, $product)
    {
        $product->update($data);
        return  response()->json([
            'product' => $product
        ], 201);
    }


    //delete the products 

    public function delete($product)
    {

        $product->delete();
        return  response()->noContent();
    }
}
