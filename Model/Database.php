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

            // aqui é onde adiciona a nova linha ao array
            $json[] = json_decode($data, true);

            // abre o ficheiro em modo de escrita
            $fp = fopen(DATABASE_FILE, 'w');
            // escreve no ficheiro em json
            fwrite($fp, json_encode($json));
            // fecha o ficheiro
            fclose($fp);

            return $data;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }

}
