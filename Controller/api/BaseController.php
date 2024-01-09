<?php

class BaseController {

    //Essa função vai retonar o código de erro 404, quando um método da classe não existir
    public function __call($name, $arguments){
        
        //Método que retorna uma resposta da API
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }

    //Pega query string da URL e coloca dentro de um vetor com as respectivas variáveis e valores
    protected function getStringParams() : array {
        parse_str($_SERVER['QUERY_STRING'], $query);
        return $query;
    }

    protected function sendOutput($name, $arguments){
        
    }

}