<?php

namespace Database\Seeders;

use App\Models\Sensor;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(['pt_BR']);
        $sensores = Sensor::all();

        $unidadesPorTipo = [
            'temperatura' => '°C',
            'umidade' => '%',
            'luminosidade' => 'Lux',
            'presenca' => 'ON'
        ];

        $dataAtual = Carbon::now('America/Sao_Paulo')->subMonth();
        $dataFinal = Carbon::now('America/Sao_Paulo');

        while($dataAtual->lessThanOrEqualTo($dataFinal)){
            foreach($sensores as $sensor){
                $tipo = $sensor->tipo;

                $unidade = $unidadesPorTipo[$tipo] ?? '';

                switch($tipo){
                    case 'temperatura':
                        $valor = $faker->randomFloat(2, 15, 35); //duas casas decimais, gravar entre 15 e 35 graus
                        break;
                    case 'umidade':
                        $valor = $faker->randomFloat(2, 20, 90); //ate 90% de umidade
                }
            }
        }
    }
}
