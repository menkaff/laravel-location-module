<?php

namespace Modules\Location\Tests\Unit\WEB;

use Tests\TestCase;

class CityTest extends TestCase
{

    /** @test */
    public function can_public_web_see_list_of_cities()
    {

        $api_public_model = config('app.api_public_model');

        $api_public_object = $api_public_model::first();

        $response = $this->actingAs($api_public_object)->json('GET', '/location/city', [
            'include_province' => 1,
        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([

            '*' => [
                "id",
                "province_id",
                "name",
                "province" => [
                    "id",
                    "name",
                    "code",
                ],
            ],
        ],
        );
    }
}
