<?php

namespace Tests\Feature;

use App\Models\Owner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetCarsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        //$response = $this->get('api/cars');

        $owner = Owner::create([
            'uid' => '123456',
            'first_name' => 'Marce',
            'last_name' => 'Marin',
        ]);

        $response = $this->post('api/cars', [
            'brand' => 'Fiat',
            'model' => 'Cronos', 'year' => '2020-02-02',
            'plate_number' => '123456',
            'color' => 'Grey',
            'owner_id' => $owner->id
        ]);

        $response->assertStatus(200);
    }
}
