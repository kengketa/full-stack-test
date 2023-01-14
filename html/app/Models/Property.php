<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','title','description','for_sale','for_rent','sold','price','currency','currency_symbol',
        'property_type','bedrooms','bathrooms','area','area_type','geo_id','street','photos'
    ];

    protected $casts = [
        'title'=>'string',
        'description'=>'string',
        'for_sale'=>'boolean',
        'for_rent'=>'boolean',
        'sold'=>'boolean',
        'price'=>'double',
        'currency'=>'string',
        'currency_symbol'=>'string',
        'property_type'=>'string',
        'bedrooms'=>'integer',
        'bathrooms'=>'integer',
        'area'=>'integer',
        'area_type'=>'string',
        'geo_id'=>'integer',
        'street'=>'string',
        'photos'=>'json',
    ];
}
