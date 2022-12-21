<?php

namespace Database\Seeders;

use App\Models\Tarefa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarefasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // criar 50 registros de tarefas
        for ($i = 0; $i < 50; $i++) {
            Tarefa::create([
                'descricao' => $faker->paragraph,
                'concluido' => $faker->boolean(50)
            ]);
            # code...
        }
    }
}