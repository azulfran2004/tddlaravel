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
        factory(Profession::class, 17)->create();

        $this->fetchRelations();
        foreach (range(1, 999) as $i) {
            $this->createRandomprofession();
        }
        
        

    }


    private function fetchRelations()
    {

        $this->skills = Skill::all();
    }


    private function createRandomprofession(): void
    {
        $profession = factory(Profession::class)->create();

        $numSkills = $this->skills->count();

        $profession->skills()->attach($this->skills->random(rand(0, $numSkills)));

        factory(\App\Login::class)->times(rand(1, 10))->create([
            'user_id' => $profession->id,
        ]);
    }
}
