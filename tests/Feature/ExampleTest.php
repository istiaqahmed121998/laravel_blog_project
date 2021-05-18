<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Attachment;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Profile;
use Database\Seeders\ProfileSeeder;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function site_is_working()
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
    public function create_user_test()
    {
        $this->withoutExceptionHandling();
        $user = User::factory(1)->create();
        $this->assertEquals(User::all()->count(),1,'Match');

        // Use model in tests...
    }

     /**
     * @test
     */
    public function blog_post_test()
    {
        $this->withoutExceptionHandling();
        $posts = Blog::factory()
            ->count(3)
            ->for(Profile::factory())
            ->create();
        $this->assertEquals(Blog::all()->count(),3,'Match');
        
    }

    public function test_a_welcome_view_can_be_rendered()
    {
        $blogs = Blog::factory(3)->create();
        $categories=Category::factory(6)->create();
        $view = $this->view('welcome',compact('blogs','categories'));

        $view->assertSee('Homepage');
    }
    
}
