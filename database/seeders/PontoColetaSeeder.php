<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PontoColeta;

class PontoColetaSeeder extends Seeder
{
    public function run(): void
    {
        $pontos = [
            ['bairro' => 'Cidade Jardim',        'dias_semana' => 'Segunda-feira', 'horario' => '09h'],
            ['bairro' => 'Panorâmico',           'dias_semana' => 'Segunda-feira', 'horario' => '13h'],
            ['bairro' => 'Santo Antônio',        'dias_semana' => 'Segunda-feira', 'horario' => '15h'],
            ['bairro' => 'Adelita Torres',       'dias_semana' => 'Terça-feira',   'horario' => '09h'],
            ['bairro' => 'Laranjeiras',          'dias_semana' => 'Terça-feira',   'horario' => '13h'],
            ['bairro' => 'São Judas Tadeu',      'dias_semana' => 'Terça-feira',   'horario' => '15h'],
            ['bairro' => 'São Francisco',        'dias_semana' => 'Quarta-feira',  'horario' => '09h'],
            ['bairro' => 'Jardim Paraíso',       'dias_semana' => 'Quarta-feira',  'horario' => '13h'],
            ['bairro' => 'Parque São João',      'dias_semana' => 'Quarta-feira',  'horario' => '15h'],
            ['bairro' => 'Cidade Verde',         'dias_semana' => 'Quinta-feira',  'horario' => '09h'],
            ['bairro' => 'Pedro Gomes',          'dias_semana' => 'Quinta-feira',  'horario' => '13h'],
            ['bairro' => 'São Pedro',            'dias_semana' => 'Quinta-feira',  'horario' => '15h'],
            ['bairro' => 'Cidade Nova',          'dias_semana' => 'Sexta-feira',   'horario' => '09h'],
            ['bairro' => 'Monte das Oliveiras',  'dias_semana' => 'Sexta-feira',   'horario' => '13h'],
            ['bairro' => 'Centro',               'dias_semana' => 'Sábado',        'horario' => '09h'],
        ];

        // Limpa e recria (idempotente)
        PontoColeta::query()->delete();

        foreach ($pontos as $ponto) {
            PontoColeta::create($ponto);
        }
    }
}
