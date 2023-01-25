<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    
    public function test_the_application_returns_a_successful_response_when_create_single_espresso()
    {
        $response = $this->post('/api/v1/single-espresso');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_when_create_double_espresso()
    {
        $response = $this->post('/api/v1/double-espresso');

        $response->assertStatus(200);
    }

    // public function test_the_application_returns_a_successful_response_when_call_status()
    // {
    //     $response = $this->get('/api/v1/status-of-espresso');

    //     $response->assertStatus(200);
    // }
}
