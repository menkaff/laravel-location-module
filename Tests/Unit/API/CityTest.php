<?php

namespace Modules\Location\Tests\Unit\API;

use Laravel\Passport\Passport;
use Tests\TestCase;

class CityTest extends TestCase
{
    /** @test */
    public function can_public_api_see_list_of_province()
    {
        $api_public_model = config('app.api_public_model');
        $api_public_model_name = config('app.api_public_model_name');

        $api_public_object = $api_public_model::first();

        Passport::actingAs(
            $api_public_object,
            [$api_public_model_name],
            $api_public_model_name
        );

        $response = $this->json('GET', '/api/location/v1/city', [
            'include_province' => 1,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'is_successful' => true,
        ]);

        $response->assertJsonStructure([
            'is_successful',
            'data' => [
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
        ]);
    }
}
