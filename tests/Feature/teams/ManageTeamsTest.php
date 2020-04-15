<?php

namespace Tests\Feature;

use App\User;
use App\Models\Team;
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
        // $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $this->post('/teams', $attributes = factory(Team::class)->raw())->assertOk();
        $this->assertDatabaseHas('teams', $attributes);
    }
    /**
     * @test
     */

    public function unauthenticated_users_can_not_create_team()
    {
        // $this->withoutExceptionHandling();
        $attributes = factory(Team::class)->raw();
        $this->post('/teams', $attributes)->assertRedirect('login');
    }
    /**
     * @test
     */

    public function a_team_requires_a_team_name()
    {
        $this->actingAs(factory(User::class)->create());
        $attributes = factory(Team::class)->raw(["team_name" => ""]);
        $this->post('/teams', $attributes)->assertSessionHasErrors('team_name');
    }

    /**
     * @test
     */

    public function a_team_requires_a_team_code()
    {

        $this->actingAs(factory(User::class)->create());
        $attributes = factory(Team::class)->raw(["team_code" => ""]);
        $this->post('/teams', $attributes)->assertSessionHasErrors('team_code');
    }

    /**
     * @test
     */

    public function a_user_can_view_all_teams()
    {


        $this->actingAs(factory(User::class)->create());
        $attributes = factory(Team::class)->create();
        $this->get('/teams/data')
            ->assertSee($attributes->team_name)
            ->assertSee($attributes->team_code);
    }

    /**
     * @test
     */

    public function a_user_can_update_a_team()
    {

        $user = factory(User::class)->create();
        $team = factory(Team::class)->create();
        $this->actingAs($user);
        $attributes = ["team_name" => 'changed', "team_code" => "changed", "team_leader" => "changed"];
        $this->patch($team->path(), $attributes)
            ->assertSee($attributes['team_name'])
            ->assertSee($attributes['team_code'])
            ->assertSee($attributes['team_leader'])
            ->assertOk();
    }

    /**
     * @test
     */

    public function a_user_can_delete_a_team()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $team = factory(Team::class)->create();
        $this->actingAs($user);
        $this->delete($team->path());
        $this->assertDatabaseMissing('teams', $team->only('id'));
    }
}
