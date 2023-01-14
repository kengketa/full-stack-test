<?php

namespace App\Transformers;

use App\Models\Property;
use League\Fractal\TransformerAbstract;

class PropertyTransformer extends TransformerAbstract
{
    public function transform(Property $property): array
    {
        $data = [
            'id' => $property->id,
            'title'=>$property->title,
            'description'=>$property->description,
            'for_sale'=>$property->for_sale,
            'for_rent'=>$property->for_rent,
            'sold'=>$property->sold,
            'price'=>$property->price,
            'currency'=>$property->price,
            'currency_symbol'=>$property->currency_symbol,
            'property_type'=>$property->property_type,
            'bedrooms'=>$property->bedrooms,
            'bathrooms'=>$property->bathrooms,
            'area'=>$property->area,
            'area_type'=>$property->area_type,
            'geo'=>$property->geolocation->toArray(),
            'street'=>$property->street,
            'photos'=>$property->photos,
        ];

        return $data;
    }
}
