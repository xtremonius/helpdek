<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Nivel básico',
            'project_id' => '1',
        ]);
        Level::create([
            'name' => 'Nivel intermedio',
            'project_id' => '1',
        ]);
        Level::create([
            'name' => 'Nivel avanzado',
            'project_id' => '1',
        ]);

        Level::create([
            'name' => 'Mesa de ayuda',
            'project_id' => '2',
        ]);
        Level::create([
            'name' => 'Consulta hardware',
            'project_id' => '2',
        ]);
        Level::create([
            'name' => 'Consulta software',
            'project_id' => '2',
        ]);
    }
}
