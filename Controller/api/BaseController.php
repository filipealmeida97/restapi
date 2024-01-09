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

    //Retornar os dados da API
    protected function sendOutput($data, $httpHeaders = array()){
        header_remove('Set-Cookie');
        
        if(is_array($httpHeaders) && count($httpHeaders)){
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }

        echo $data;
        exit;
    }

}