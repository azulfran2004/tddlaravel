<?php

use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Skill;

class ProfessionSeeder extends Seeder
{
    private $skills;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profession::create([
            'title' => 'Desarrollador Back-End',
            'description' => 'descripcion1',
            'education_level' => 'alto',
            'sector' => 'aaa',
            'salary' => '1',
            'experience_required' => '1',
        ]);
        Profession::create([
            'title' => 'b',
            'description' => 'b',
            'education_level' => 'b',
            'sector' => 'b',
            'salary' => '1',
            'experience_required' => '1',
        ]);
        Profession::create([
            'title' => 'x',
            'description' => 'x',
            'education_level' => 'x',
            'sector' => 'x',
            'salary' => '1',
            'experience_required' => '1',
        ]);

        factory(Profession::class, 17)->create();
    }
}
