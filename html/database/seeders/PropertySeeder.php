<?php

namespace Database\Seeders;

use App\Actions\SavePropertyAction;
use App\Models\Geolocation;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputFilePath = base_path('../properties.json');
        if(!File::exists($inputFilePath)){
           return;
        }
        $properties = json_decode(File::get($inputFilePath));
        foreach ($properties as $property){
                $savePropertyAction = new SavePropertyAction();
                $savePropertyAction->execute(new Property(),$property);
        }
    }
}
