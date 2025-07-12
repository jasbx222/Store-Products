<?php



namespace App\Http\Service\stores;

use App\Models\Store;

class StoreService
{

    //get all stores
    public function index()
    {
        return response()->json(Store::all());
    }

    // get the product with the stores 

    public function show($store)
    {
        return response()->json([
            'store' => $store,
            'products' => $store->products
        ]);
    }



    // add new store to our system 
    public function store(array $data)
    {

        $store = Store::create($data);
        return  response()->json([
            'store' => $store
        ], 201);
    }



    //update the store 


    public function update(array $data, $store)
    {
        $store->update($data);
        return  response()->json([
            'store' => $store
        ], 201);
    }


    //delete the store 

    public function delete($store)
    {

        $store->delete();
        return  response()->noContent();
    }
}
