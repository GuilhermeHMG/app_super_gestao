<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criando a tabela 'filiais'
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30); //Nome da filial
            $table->timestamps();
        });

        //Criando a tabela 'produto_filiais'
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id'); //fk
            $table->unsignedBigInteger('produto_id'); //fk
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //Incluindo as foreign keys (constraints)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //Removendo colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Fazendo o inverso de cada operação acima

        //Adicionar colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        /**
         * Revertendo a criação da tabela 'produto_filiais'
         * Como as contraints estão associadas "a tabela produto_filiais", podemos
         * apenas remover a tabela
         */
        Schema::dropIfExists('produto_filiais');

        //Removendo a tabela 'filiais'
        Schema::dropIfExists('filiais');
    }
}
