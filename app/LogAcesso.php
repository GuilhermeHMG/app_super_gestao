<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    /**
     * Abaixo, estamos informando que o atributo 'log' do objeto $fillable, que representa a coluna log
     * da tabela 'log_acessos', pode ser preenchida de modo massivo, e dessa forma poderemos utilizar o 
     * método estatico 'create' do objeto 'LogAcesso'  
     */
    protected $fillable = ['log'];
}
