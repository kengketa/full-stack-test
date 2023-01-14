<?php

namespace App\Actions;

use App\Models\Geolocation;
use Illuminate\Support\Str;
use App\Models\Property;
use stdClass;

class SavePropertyAction
{
    protected Property $property;

    public function execute(Property $property, stdClass $data): Property
    {
        $this->property = $property;

//        if (! empty($this->property->id)) {
//            $this->property->update($data);
//            return $this->property;
//        }
        $foundGeo = Geolocation::where('country',strtolower($data->geo->country))
            ->where( 'province',strtolower($data->geo->province))
            ->first();
        if(!$foundGeo){
            $foundGeo = Geolocation::create([
                'country' => strtolower($data->geo->country),
                'province' => strtolower($data->geo->province),
            ]);
        }
        //create case
        $this->property->title = $data->title;
        $this->property->description = $data->description;
        $this->property->for_sale = $data->for_sale;
        $this->property->for_rent = $data->for_rent;
        $this->property->sold = $data->sold;
        $this->property->price = $data->price;
        $this->property->currency = $data->currency;
        $this->property->currency_symbol = $data->currency_symbol;
        $this->property->property_type = $data->property_type;
        $this->property->bedrooms = $data->bedrooms;
        $this->property->bathrooms = $data->bathrooms;
        $this->property->area = $data->area;
        $this->property->area_type = $data->area_type;
        $this->property->geo_id = $foundGeo->id;
        $this->property->street = $data->geo->street;
        $this->property->save();
        return $this->property;
    }

}
