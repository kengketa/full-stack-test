<?php

namespace App\Http\Controllers;

use App\Models\Geolocation;
use App\Models\Property;
use App\Transformers\PropertyTransformer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index(Request $request, $province = null)
    {
        $req = $request->all();
        $availableProvince = 0;
        if ($province) {
            $provinceLowerCase = strtolower($province);
            $availableProvince = Geolocation::where('province', 'like', "%$provinceLowerCase%")->count();
        }
        if ($province && $availableProvince == 0) {
            abort(404);
        }
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
