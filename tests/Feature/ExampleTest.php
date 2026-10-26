<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('src="' . asset('img/afbI_logo.png') . '"', false)
            ->assertSee('src="' . asset('img/twitter.png') . '"', false)
            ->assertSee('src="' . asset('img/instagram.png') . '"', false)
            ->assertSee('src="' . asset('img/facebook.png') . '"', false);
    }
}
