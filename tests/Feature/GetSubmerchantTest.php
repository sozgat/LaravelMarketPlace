<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GetSubmerchantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getSubmerchant()
    {
        $response = $this->json("GET", '/api/get/submerchantsForMerchant/20');

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => 15,
                'id' => 16,
                'id' => 17,
            ])
            ->assertJsonMissing([
                'id' => 4
            ])
        ;

    }
}
