<?php

class Database {

    public function select($limit) : array{
        try {
            $users = json_decode(file_get_contents(DATABASE_FILE), TRUE);
            $users = array_slice($users, 0, $limit);
            return $users;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }

    public function insert($data) {
        try {
            // extrai a informação do ficheiro
            $string = file_get_contents(DATABASE_FILE);
            // faz o decode o json para uma variavel php que fica em array
            $json = json_decode($string, true);
            $data = json_decode($data, true);
            
            if(!isset($data[0]) && !$this->existIdBinary($json, $data['user_id'], 'user_id')){

                // aqui é onde adiciona a nova linha ao array
                $json[] = $data;

                // abre o ficheiro em modo de escrita
                $fp = fopen(DATABASE_FILE, 'w');
                // escreve no ficheiro em json
                fwrite($fp, json_encode($json));
                // fecha o ficheiro
                fclose($fp);
                
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }

    // Função para virificar a existencia do ID
    function existIdBinary(Array $arr, $x, $index){
        // Ordena array
        asort($arr);
        //Indexa numericamente o array
        $arr = array_values($arr);
        // Checa se o array está vazio
        if (count($arr) === 0) return false;
        $low = 0;
        $high = count($arr) - 1;
        
        while ($low <= $high) {

            // Armazena o valor do indice central
            $mid = floor(($low + $high) / 2);
    
            // Se o valor for encontrado
            if($arr[$mid][$index] == $x) {
                return true;
            }
    
            if ($x < $arr[$mid][$index]) {
                // Pesquisa o lado esquerdo
                $high = $mid -1;
            }
            else {
                // Pesquisa lado direito
                $low = $mid + 1;
            }
        }
        
        // Se o elemento não existir
        return false;
    }

}
