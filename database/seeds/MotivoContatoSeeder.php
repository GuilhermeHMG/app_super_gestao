<?php

use Illuminate\Database\Seeder;
use App\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Método de inserção 2: Usando o método create (atenção para o atributo fillable da classe)
         MotivoContato::create(['motivo_contato' => 'Dúvida']);
         MotivoContato::create(['motivo_contato' => 'Elogio']);
         MotivoContato::create(['motivo_contato' => 'Reclamação']);
         MotivoContato::create(['motivo_contato' => 'Sugestão']);
    }
}
