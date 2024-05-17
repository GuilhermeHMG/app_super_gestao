<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //$request - Manipular a requisição assim que chegar do Browser
        // return $next($request); //Aqui, estamos apenas recuperando a requisição do browser e ''empurrando para a nossa aplicação
        //response - Manipular a resposta antes de devolver ao Browser

        /* O método 'Response' forma um OBJETO DE RESPOSTA, ou seja, forma um response HTTP para o browser que solicitou a resposta,
        * através do método response, estamos alterando o resultado da resposta
        */

        /**
         * O método 'dd()', além dele dar um 'die' no script para parar a sua execução, ele forma um objeto 'response', e é por isso
         * que tempo a condição de utilizá-lo no corpo do Middleware. Se esássemos o 'print_r()', ele também iria expor os dados do 
         * $request, mas NÃO FORMARIA UM OBJETO DE RESPOSTA, e assim, teríamos um erro
         */
        // dd($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);
        // return Response('Chegamos no Middleware e finalizamos no próprio Middleware');

        // return $next($request);

        $resposta = $next($request);

        $resposta->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados');
        
        return $resposta;
    }
}
