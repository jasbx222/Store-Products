<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Service\stores\StoreService;

class StoreController extends Controller
{
   
    private $StoreService;

    public function __construct(StoreService $service)
    {
        return $this->StoreService = $service;
    }
    /**
     * @return all stores
     */
    // جلب كل المخازن من قاعدة البيانات
    public function index()
    {
        return $this->StoreService->index();
        //
    }

    /**
         * @return one store
     */
  //جلب المخزن منفرد
    public function show(Store $store)
    {
        return $this->StoreService->show($store);
        //
    }

    /**
        * @return add   stores 
     */
    // اضافة مخزن جديد 
    public function store(StoreStoreRequest $request)
    {
        return $this->StoreService->store($request->validated());
    }





    /**
         * @return update stores.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        return $this->StoreService->update($request->validated(), $store);
    }

    /**
     *      * @return no contanct 
     */
    public function destroy(Store $store)
    {
        return $this->StoreService->delete($store);
    }
}
