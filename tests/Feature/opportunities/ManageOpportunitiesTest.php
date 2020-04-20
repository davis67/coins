<?php

namespace Tests\Feature;

use App\Models\Opportunity;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageOpportunitiesTest extends TestCase
{
    use WithFaker, RefreshDatabase;


    /**
     * @test
     */

    public function a_user_can_create_an_opportunity()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $attributes = factory(Opportunity::class)->raw();
        // dd($attributes);
        $this->post('/opportunities', $attributes)
            ->assertSee($attributes['clients_name'])
            ->assertSee($attributes['opportunity_name'])
            ->assertSee($attributes['type'])
            ->assertSee($attributes['internal_deadline'])
            ->assertSee($attributes['external_deadline']);

    }


    /**
     * @test
     */

    public function a_user_can_view_opportunities()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $opportunity = factory(Opportunity::class)->create();
        $data = $this->get('/opportunities/data')
            ->assertSee($opportunity['clients_name'])
            ->assertSee($opportunity['opportunity_name'])
            ->assertSee($opportunity['type'])
            ->assertSee($opportunity['om_number'])
            ->assertSee($opportunity['funder']);

    }

     /**
     * @test
     */

    public function a_user_can_view_a_single_opportunity()
    {

        $user = factory(User::class)->create();
        $this->actingAs($user);
        $opportunity = factory(Opportunity::class)->create();
        $data = $this->get($opportunity->path())
            ->assertSee($opportunity['clients_name'])
            ->assertSee($opportunity['opportunity_name'])
            ->assertSee($opportunity['type'])
            ->assertSee($opportunity['om_number'])
            ->assertSee($opportunity['funder']);

    }

     /**
     * @test
     */

    public function a_consultant_can_be_assigned_an_opportunity()
    {
         $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $consultant =factory(User::class)->create();
        $opportunity =factory(Opportunity::class)->create();
        $this->get('/opportunities/'.$opportunity->id.'/assign/'.$consultant->id)->assertOk();
        $this->assertDatabaseHas('consultant_opportunity', [
            'user_id'=> $consultant->id,
            'opportunity_id'=>$opportunity->id
        ]);

    }
}
