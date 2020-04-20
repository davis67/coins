<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Models\Opportunity;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class UserTest extends TestCase
{
     use RefreshDatabase, withFaker;

      /** @test */
    public function a_user_has_opportunities()
    {
        $user = factory(User::class)->create();
        $this->assertInstanceOf(Collection::class, $user->opportunities);
    }

     /** @test */
    public function it_is_assigned_to_many_opportunities()
    {

        $opportunity =factory(Opportunity::class)->create();
        $user =factory(User::class)->create();
        $user->assignedOpportinities()->sync($opportunity);
        $this->assertDatabaseHas('consultant_opportunity', [
            'user_id'=> $user->id,
            'opportunity_id'=>$opportunity->id
        ]);
        $this->assertInstanceOf(Collection::class, $user->assignedopportinities);
    }
}
