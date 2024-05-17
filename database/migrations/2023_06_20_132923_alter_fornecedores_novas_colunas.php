<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Adicionando colunas
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Removendo colunas
        Schema::table('fornecedores', function (Blueprint $table) {
            //para remover colunas

            //Podemos remover unitariamente
            //$table->dropColumn('uf');
            //$table->dropColumn('email');

            //Ou varias de uma só vez
            $table->dropColumn(['uf','email']);
        });
    }
}
