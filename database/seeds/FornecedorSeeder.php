<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Método de inserção 1: Instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Aços Vital Indústria Metalúrgica LTDA';
        $fornecedor->site = 'acosvital.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'contato@acosvital.com.br';
        $fornecedor->save();

        //Método de inserção 2: Usando o método create (atenção para o atributo fillable da classe)
        Fornecedor::create([
            'nome'=>'Mogi Massas Indústria de Alimentos ME',
            'site'=>'mogimassas.com.br',
            'uf'=>'SP',
            'email'=>'contato@mogimassas.com.br',
        ]);

        //Método de inserção 3: Usando o método insert
        DB::table('fornecedores')->insert([
            'nome'=>'Gerdau Indústria de Usinagem LTDA',
            'site'=>'gerdau.com.br',
            'uf'=>'RN',
            'email'=>'contato@gerdau.com.br',
        ]);
    }
}
