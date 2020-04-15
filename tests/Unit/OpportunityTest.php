<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Opportunity;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OpportunityTest extends TestCase
{
    use RefreshDatabase, withFaker;

      /** @test */
    public function it_belongs_to_a_creator()
    {
        $this->withoutExceptionHandling();
        $this->actingAs( factory(User::class)->create());
        $attributes =factory(Opportunity::class)->raw();
        $opportunity = auth()->user()->opportunities()->create($attributes);
        $this->assertInstanceOf('App\User', $opportunity->creator);
    }
}
