<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleMiddlewareTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function only_login_user_access_this_route(){
        $this->get('/admin')->assertRedirect('/login');
    }
}
