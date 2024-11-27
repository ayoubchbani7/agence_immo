<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_send_not_found_on_existent_property(): void
    {
        $response = $this->get('/property/{id}/{}');

        $response->assertStatus(200);
    }
    public function test_ok_on_property(): void
    {
        $response = $this->get('/property/{id}/{}');

        $response->assertStatus(404);
    }
}
