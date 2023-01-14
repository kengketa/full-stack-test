<?php

namespace Tests\Property;

use App\Models\Property;
use Tests\Setup\RefreshDatabase;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_can_be_view()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_only_unsold_and_for_sale_properties_to_be_displayed()
    {
        $response = $this->get('/');
        $properties = $response->getOriginalContent()->getData()['page']['props']['properties']['data'];
        foreach ($properties as $property) {
            $this->assertEquals(true, $property['for_sale']);
            $this->assertEquals(false, $property['sold']);
        }
    }

    public function test_location_can_be_filtered_by_province()
    {
        $response = $this->get('/bangkok');
        $properties = $response->getOriginalContent()->getData()['page']['props']['properties']['data'];
        foreach ($properties as $property) {
            $this->assertEquals('bangkok', $property['geo']['province']);
        }
    }

    public function test_properties_title_searched()
    {
        $property = Property::inRandomOrder()->first();
        $mockSearchWordArray = explode(' ', $property->title);
        $mockSearchWordStr = $mockSearchWordArray[2];
        $mockUrl = '/?search='.$mockSearchWordStr;
        $response = $this->get($mockUrl);
        $properties = $response->getOriginalContent()->getData()['page']['props']['properties']['data'];
        foreach ($properties as $property) {
            $this->assertEquals(true, (
                str_contains($property['title'], $mockSearchWordStr) ||
                str_contains($property['description'], $mockSearchWordStr))
            );
        }
    }

    public function test_properties_description_searched()
    {
        $property = Property::inRandomOrder()->first();
        $mockSearchWordArray = explode(' ', $property->description);
        $mockSearchWordStr = $mockSearchWordArray[4];
        $mockUrl = '/?search='.$mockSearchWordStr;
        $response = $this->get($mockUrl);
        $properties = $response->getOriginalContent()->getData()['page']['props']['properties']['data'];
        foreach ($properties as $property) {
            $this->assertEquals(true, (
                str_contains($property['title'], $mockSearchWordStr) ||
                str_contains($property['description'], $mockSearchWordStr))
            );
        }
    }


}
