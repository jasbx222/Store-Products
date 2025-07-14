<?php



namespace App\Http\Service\stores;

use App\Http\Resources\StoreResource;
use App\Models\Store;

class StoreService
{

    //get all stores
    public function index()
    {
        return  StoreResource::collection(Store::all());
    }

    // get the product with the stores 

    public function show($store)
    {
        return response()->json([
            'store' => new StoreResource($store)
        ]);
    }



    // add new store to our system 
    public function store(array $data)
    {

        $store = Store::create($data);
        return  new StoreResource($store);
    }



    //update the store 


    public function update(array $data, $store)
    {
        $store->update($data);
        return  new StoreResource($store);
    }


    //delete the store 

    public function delete($store)
    {

        $store->delete();
        return  response()->noContent();
    }
}
