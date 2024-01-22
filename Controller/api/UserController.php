<?php
class UserController extends BaseController{
    
    public function listAction(){
        //variável para guardar os erros
        $erroDescription = "";
        //variável para guardar os métodos de requisição
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        
        $stringParamsArray = $this->getStringParams();

        //Se o método requisitado for GET
        if(strtoupper($requestMethod) == 'GET'){
            try {
                $userModel = new UserModel();

                $intLimit = 10;

                if(isset($stringParamsArray['limit']) && $stringParamsArray['limit']) {
                    $intLimit = $stringParamsArray['limit'];
                }
                
                //Chama o método que recuperar os usuários na classe UserModel
                $usersArray = $userModel->getUsers($intLimit);
                //Retorna o JSON COM OS USUÁRIOS
                $responseData = json_encode($usersArray);
            } catch (Error $e) {
                $erroDescription = $e->getMessage(). 'Something went wrong! Please contact administrators';
                $errorHeader  = 'HTTP/1.1 500 Internal Server Error';
            }
        }else{
            // $dados = file_get_contents("php://input");
            // echo $dados;
            // exit;
            $erroDescription = 'Method not supported';
            $errorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

        //send output
        if(!$erroDescription) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }else {
            $this->sendOutput(json_encode(array('error' => $erroDescription)),
                array('Content-Type: application/json', $errorHeader)
            );
        }
    }


    public function insertAction(){
        //variável para guardar os erros
        $erroDescription = "";
        //variável para guardar os métodos de requisição
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        
        //Se o método requisitado for GET
        if(strtoupper($requestMethod) == 'POST'){
            try {
                $userModel = new UserModel();

                if($dados = file_get_contents("php://input")){

                    //Chama o método que insere os usuários na classe UserModel e grava na variável
                    $responseData = $userModel->setUsers($dados);

                }else{
                    $this->sendOutput(json_encode(array('error' => "Data not found")),
                    array('Content-Type: application/json', 'HTTP/1.1 422 Unprocessable Entity')
                    );
                }
                
            } catch (Error $e) {
                $erroDescription = $e->getMessage(). 'Something went wrong! Please contact administrators';
                $errorHeader  = 'HTTP/1.1 500 Internal Server Error';
            }
        }else{
            // $dados = file_get_contents("php://input");
            // echo $dados;
            // exit;
            $erroDescription = 'Method not supported';
            $errorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

        //send output
        if(!$erroDescription) {
            $this->sendOutput(
                $responseData . "Insertion Completed",
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }else {
            $this->sendOutput(json_encode(array('error' => $erroDescription)),
                array('Content-Type: application/json', $errorHeader)
            );
        }
    }

}