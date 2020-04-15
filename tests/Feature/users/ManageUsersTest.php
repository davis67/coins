<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class ManageUsersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */

    public function an_administrator_can_create_users()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $attributes = factory(User::class)->raw();
        $this->post('/users', $attributes)
            ->assertSee($attributes['email'])
            ->assertSee($attributes['staffId']);

        $this->assertTrue(
            Hash::check('secret', User::whereName($attributes['name'])
                ->first()
                ->password)
        );
    }

    /**
     * @test
     */

    public function an_administrator_can_view_all_users()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $attributes = factory(User::class)->create();
        $this->get('/users/data')
            ->assertSee($attributes['email'])
            ->assertSee($attributes['staffId']);
    }
}
