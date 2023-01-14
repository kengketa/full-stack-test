<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Transformers\PropertyTransformer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index(Request $request, $province = null)
    {
        $req = $request->all();
        $filters['page'] = $req['page'] ?? 1;
        $filters['province'] = $province ?? null;
        $filters['search'] = $req['search'] ?? null;
        $properties = Property::filter($filters)->paginate(25);
        $propertyData = fractal($properties, new PropertyTransformer())->toArray();
        return Inertia::render(
            'Property/Index',
            [
                "properties" => $propertyData,
                "filters" => $filters,
            ]
        );
    }
}
