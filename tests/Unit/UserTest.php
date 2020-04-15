<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
     use RefreshDatabase, withFaker;

      /** @test */
    public function a_user_has_opportunities()
    {
        $user = factory(User::class)->create();
        $this->assertInstanceOf(Collection::class, $user->opportunities);
    }
}
