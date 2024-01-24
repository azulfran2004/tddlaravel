<?php

namespace Tests\Feature\Admin;

use App\Profession;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListProfessionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_shows_the_professions_list()
    {
        factory(Profession::class)->create(['title' => 'Diseñador']);
        factory(Profession::class)->create(['title' => 'Programador']);
        factory(Profession::class)->create(['title' => 'Administrador']);

        $this->get('profesiones')
            ->assertStatus(200)
            ->assertSeeInOrder([
                'Administrador',
                'Diseñador',
                'Programador',
            ]);
    }
    /** @test */
    function it_shows_a_default_message_if_the_professions_list_is_empty()
    {
        $this->get('profesiones')
            ->assertStatus(200)
            ->assertSee('No hay profesiones registrados');

    }
    /** @test */
    function professions_are_ordered_by_name()
    {
        factory(Profession::class)->create(['title' => 'Diseñador']);
        factory(Profession::class)->create(['title' => 'Programador']);
        factory(Profession::class)->create(['title' => 'Administrador']);

        $this->get('profesiones')
            ->assertStatus(200)
            ->assertSeeInOrder([
                'Administrador',
                'Diseñador',
                'Programador',
            ]);
    }
}
