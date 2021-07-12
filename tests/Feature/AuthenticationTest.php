<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMustEnterUserNameAndPassword()
    {
        $response = $this->post(route('auth.authenticate'));

        $response->assertSessionHasErrors(
            [
                'userName' => 'user name không được để trống.',
                'password' => 'password không được để trống.'
            ]
        );
        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function testMustEnterMinCharacterUserNameAndPassword()
    {
        $dataLogin = [
            'userName' => Str::random(4),
            'password' => Str::random(4)
        ];
        $response = $this->post(route('auth.authenticate'),$dataLogin);

        $response->assertSessionHasErrors(
            [
                'userName' => 'user name phải lớn hơn 5 ký tự.',
                'password' => 'password phải lớn hơn 5 ký tự.'
            ]
        );
        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function testMustEnterMaxCharacterUserNameAndPassword()
    {
        $dataLogin = [
            'userName' => Str::random(300),
            'password' => Str::random(300)
        ];
        $response = $this->post(route('auth.authenticate'),$dataLogin);

        $response->assertSessionHasErrors(
            [
                'userName' => 'user name phải nhỏ hơn 250 ký tự.',
                'password' => 'password phải nhỏ hơn 250 ký tự.'
            ]
        );
        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function testFailedLogin()
    {
        $dataLogin = [
          'userName' => $this->faker()->userName(),
          'password' => $this->faker()->text()
        ];
        $response = $this->post(route('auth.authenticate'),$dataLogin);

        $response->assertSessionHas(['message-error']);
        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function testSuccessfullyLogin()
    {
        User::factory()->create(
            [
                'UserName' => 'test_login_successfully',
                'Password' => 'test@123'
            ]
        );
        $dataLogin = [
            'userName' => 'test_login_successfully',
            'password' => 'test@123'
        ];
        $response = $this->post(route('auth.authenticate'),$dataLogin);

        $response->assertSessionHas(['message-success']);
        $response->assertRedirect(route('dashboard.index'));
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertAuthenticated();
    }

    public function testSuccessfullyLogout()
    {
        $response = $this->get(route('auth.logout'));

        $response->assertSessionHasNoErrors();
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertGuest();
    }

    public function testRedirectWhileSessionLoginValid()
    {
        $user = User::factory()->create(
            [
                'UserName' => 'test_login_successfully',
                'Password' => 'test@123'
            ]
        );
        $this->actingAs($user);

        $response = $this->get(route('auth.login'));

        $response->assertRedirect(route('dashboard.index'));
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /**
     * @return void
     */
    public function tearDown(): void
    {
        User::where('UserName','test_login_successfully')->delete();
        parent::tearDown();
    }
}
