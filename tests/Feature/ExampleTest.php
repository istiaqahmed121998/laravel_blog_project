<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Attachment;
use App\Models\Blog;
use App\Models\Profile;
use Database\Seeders\ProfileSeeder;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testBasicTest1()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    /** @test */
    public function only_login_user_access_this_route()
    {
        
        $response = $this->get('/admin')
            ->assertRedirect('/login');
    }
    /** @test */
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

    /** @test */
    public function only_author_can_access_this_route()
    {
        $this->withoutExceptionHandling();
        $role = Role::create(['name'=>'Author']);
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


    /**
     * @test
     */
    public function testDatabase()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make();
        

        // Use model in tests...
    }

     /**
     * @test
     */
    public function role_test()
    {
        $this->withoutExceptionHandling();
        $posts = Blog::factory()
            ->count(3)
            ->for(Profile::factory())
            ->create();
        
    }
    
}
