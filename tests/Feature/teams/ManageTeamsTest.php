<?php

namespace Tests\Feature;

use App\User;
use App\Team;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTeamsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */

    public function a_user_can_create_a_team()
    {
        $this->actingAs(factory(User::class)->create());
        $this->get('/teams/create')->assertStatus(200);
        $this->post('/teams', $attributes = factory(Team::class)->raw())->assertOk();
        $this->assertDatabaseHas('teams', $attributes);
    }

    /**
     * @test
     */

    public function a_team_requires_a_team_name()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $this->get('/teams/create')->assertStatus(200);
        $attributes = factory(Team::class)->raw(["team_name" => ""]);
        $this->post('/teams', $attributes)->assertSessionHasErrors('team_name');
    }

    /**
     * @test
     */

    public function a_team_requires_a_team_code()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $this->get('/teams/create')->assertStatus(200);
        $attributes = factory(Team::class)->raw(["team_code" => ""]);
        $this->post('/teams', $attributes)->assertSessionHasErrors('team_code');
    }
}
