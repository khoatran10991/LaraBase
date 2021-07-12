<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRequiredAuthentication()
    {
        $response = $this->get('/');

        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect(route('auth.login'));
    }

    public function testAccessDashboardWithAuthenticate()
    {
        $user = User::factory()->create(
            [
                'UserName' => 'test_Access_Dashboard_With_Authenticate'
            ]
        );
        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @return void
     */
    public function tearDown(): void
    {
        User::where('UserName','test_Access_Dashboard_With_Authenticate')->delete();
        parent::tearDown();
    }
}
