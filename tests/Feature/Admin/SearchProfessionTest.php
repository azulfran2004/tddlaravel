<?php

namespace Tests\Feature\Admin;

use App\Profession;
use App\Team;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchProfessionTest extends TestCase
{
    use RefreshDatabase;
    function search_professions_by_title()
    {
        $joel = factory(Profession::class)->create([
            'title' => 'Joel',
        ]);

        $ellie = factory(Profession::class)->create([
            'title' => 'Ellie',
        ]);

        $this->get('profesiones?search2=Joel')
            ->assertStatus(200)
            ->assertViewHas('profesiones', function ($profesions) use ($joel, $ellie) {
                return $profesions->contains($joel) && !$profesions->contains($ellie);
            });
    }

    /** @test */
    function partial_search_by_title()
    {
        $joel = factory(Profession::class)->create([
            'title' => 'Joel',
        ]);

        $ellie = factory(Profession::class)->create([
            'title' => 'Ellie',
        ]);

        $this->get('profesiones?search2=Jo')
            ->assertStatus(200)
            ->assertViewHas('profesiones', function ($profesions) use ($joel, $ellie) {
                return $profesions->contains($joel) && !$profesions->contains($ellie);
            });
    }
    function search_professions_by_sector()
    {
        $joel = factory(Profession::class)->create([
            'sector' => 'Joel',
        ]);

        $ellie = factory(Profession::class)->create([
            'sector' => 'Ellie',
        ]);

        $this->get('profesiones?search=Joel')
            ->assertStatus(200)
            ->assertViewHas('profesiones', function ($profesions) use ($joel, $ellie) {
                return $profesions->contains($joel) && !$profesions->contains($ellie);
            });
    }

    /** @test */
    function partial_search_by_sector()
    {
        $joel = factory(Profession::class)->create([
            'sector' => 'Joel',
        ]);

        $ellie = factory(Profession::class)->create([
            'sector' => 'Ellie',
        ]);

        $this->get('profesiones?search=Jo')
            ->assertStatus(200)
            ->assertViewHas('profesiones', function ($profesions) use ($joel, $ellie) {
                return $profesions->contains($joel) && !$profesions->contains($ellie);
            });
    }
}
