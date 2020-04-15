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
        $this->withoutExceptionHandling();
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
}
