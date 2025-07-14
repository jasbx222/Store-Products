<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;

class StoreResource extends JsonResource
{
    protected function formatDate($date)
    {
        return $date ? \Carbon\Carbon::parse($date)->format('Y-m-d h:i A') : null;
    }
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name,
            'location' => $this->location,
            'created_at'  => $this->formatDate($this->created_at),
            'updated_at' => $this->formatDate($this->updated_at),
            'products' => $this->when(
                $request->routeIs('stores.show'),
                fn() => ProductResource::collection($this->products),
            )
        ];
    }
}
