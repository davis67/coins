<?php

namespace Tests\Unit;


use App\Models\Team;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    /**
     @test
     */
    public function it_has_a_path()
    {
        $team = factory(Team::class)->create();
        $this->assertEquals('/teams/' . $team->id, $team->path());
    }
}
