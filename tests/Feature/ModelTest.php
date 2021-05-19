<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function create_user_test()
    {
        $this->withoutExceptionHandling();
        $user = User::factory(1)->create();
        $this->assertEquals(User::all()->count(),1,'Match');

    }

    /**
     * @test
     */
    public function create_category_test()
    {
        $this->withoutExceptionHandling();
        $category = Category::factory(1)->create();
        $this->assertEquals(Category::all()->count(),1,'Match');

    }

    public function blog_post_test()
    {
        $this->withoutExceptionHandling();
        $posts = Blog::factory()
            ->count(3)
            ->for(Profile::factory())
            ->create();
        $this->assertEquals(Blog::all()->count(),3,'Match');
        
    }
}
