<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchProvincesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_provinces_on_success()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 12|3PflJoHFZkNBI61UTvV8qxIdTUeG0C7eAhH3W50r'
        ])->get('/api/search/provinces');

        $response->assertStatus(200);
    }

    public function test_search_province_by_id_on_success()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 12|3PflJoHFZkNBI61UTvV8qxIdTUeG0C7eAhH3W50r'
        ])->get('/api/search/provinces?province_id=1');

        $response->assertStatus(200);
    }

    public function test_get_all_cities_on_success()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 12|3PflJoHFZkNBI61UTvV8qxIdTUeG0C7eAhH3W50r'
        ])->get('/api/search/cities');

        $response->assertStatus(200);
    }

    public function test_search_city_by_id_on_success()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 12|3PflJoHFZkNBI61UTvV8qxIdTUeG0C7eAhH3W50r'
        ])->get('/api/search/provinces?city_id=1');

        $response->assertStatus(200);
    }

    public function test_search_province_by_id_not_found()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 12|3PflJoHFZkNBI61UTvV8qxIdTUeG0C7eAhH3W50r'
        ])->get('/api/search/provinces?province_id=999');

        $response->assertStatus(404);
    }

    public function test_search_city_by_id_not_found()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 12|3PflJoHFZkNBI61UTvV8qxIdTUeG0C7eAhH3W50r'
        ])->get('/api/search/cities?city_id=99999');

        $response->assertStatus(404);
    }

    public function test_hit_endpoint_provinces_without_token_should_unauthorized()
    {
        $response = $this->get('/api/search/provinces');

        $response->assertStatus(401);
    }

    public function test_hit_endpoint_cities_without_token_should_unauthorized()
    {
        $response = $this->get('/api/search/cities');

        $response->assertStatus(401);
    }


}
