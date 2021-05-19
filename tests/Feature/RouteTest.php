<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function home_route_is_working()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test */
    public function post_route_is_working()
    {
        $response = $this->get('/post');

        $response->assertStatus(500);
    }
    /** @test */
    public function login_route_is_working()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    /** @test */
    public function register_route_is_working()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /** @test */
    public function incorrect_page_is_workign()
    {
        $response = $this->get('/fsdfdsdfg');
        $response->assertStatus(404);
    }

    /** @test */
    public function only_login_user_access_this_route()
    {

        $response = $this->get('/admin')->assertRedirect('/login');
    }
    public function only_admin_can_access_this_route()
    {
        $this->withoutExceptionHandling();
        $role = Role::create(['name'=>'admin']);
        $user = User::create([
            'name' => 'Zenith Jhony',
            'email' => 'zenithzonezj@gmail.com',
            'password' => '123456789',
            'role_id' => 1,
        ]);
        $profile_slug=Str::slug($user->name,'-');
        if (Profile::where('profile_link', '=', $profile_slug)->exists()) {
            $profile_slug=$this->$profile_slug;
        }
        $user->profile()->save(new Profile([
            'profile_link' => $profile_slug,
            'avatar'=>""
        ]));
        $response = $this->actingAs($user)->get('/admin')
            ->assertOk();
    }
}
