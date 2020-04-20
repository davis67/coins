<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Opportunity;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OpportunityTest extends TestCase
{
    use RefreshDatabase, withFaker;

    /**
     * @test
     */
    public function it_has_a_path(){

        $opportunity = factory(Opportunity::class)->create();
        $this->assertEquals('/opportunities/'.$opportunity->id, $opportunity->path());
    }

      /** @test */
    public function it_belongs_to_a_creator()
    {

        $opportunity =factory(Opportunity::class)->create();
        $this->assertInstanceOf('App\User', $opportunity->creator);
    }

     /** @test */
    public function it_belongs_to_a_team()
    {

        $opportunity =factory(Opportunity::class)->create();
        $this->assertInstanceOf('App\Models\Team', $opportunity->team);
    }

     /** @test */
    public function it_may_have_consultants()
    {
        $opportunity =factory(Opportunity::class)->create();
        $this->assertInstanceOf(Collection::class, $opportunity->consultants);
    }

     /** @test */
    public function it_may_be_assigned_to_consultants()
    {
        $opportunity =factory(Opportunity::class)->create();
        $consultant =factory(User::class)->create();
        $opportunity->assignConsultant($consultant);
        $this->assertCount(1, $opportunity->consultants);
        $this->assertTrue($opportunity->consultants->contains($consultant));
    }
}
