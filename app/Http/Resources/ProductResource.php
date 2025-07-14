<?php

namespace App\Http\Resources;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    protected function formatDate($date)
    {
        return $date ? \Carbon\Carbon::parse($date)->format('Y-m-d h:i A') : null;
    }

    public function toArray(Request $request): array
    {

     


        return [
            'id'         => $this->id,
            'code'       => $this->code,
            'name'       => $this->name,
            'total'      => $this->total,
            'price'      => $this->price,
            'created_at'  => $this->formatDate($this->created_at),
            'updated_at' => $this->formatDate($this->updated_at),
            'stores' => $this->when(
                $request->routeIs('products.show'),
                fn() => StoreResource::collection($this->stores),
            )
        ];
    }
}
