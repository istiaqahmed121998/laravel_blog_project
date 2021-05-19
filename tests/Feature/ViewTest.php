<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class viewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    use WithFaker;
    
    /**
     * @test
     */

    public function test_a_welcome_view_can_be_rendered()
    {
        $blogs = Blog::factory(3)->create();
        $categories=Category::factory(6)->create();
        $view = $this->view('welcome',compact('blogs','categories'));

        $view->assertSee('Homepage');
    }
    
}
