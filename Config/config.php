<?php
//definir variáveis globais
//CAMINHO PADRÃO/RAIZ DO PROJETO
define("ROOT_PATH", __DIR__."/../");

//CAMINHO PADRÃO DO ARQUIVO DE BANCO DE DADOS
define("DATABASE_FILE", ROOT_PATH."database.json");

//CAMINHO DO CONTROLLER PADRÃO
require_once ROOT_PATH . "/Controller/Api/BaseController.php";


//CAMINHO DO MODEL USER
require_once ROOT_PATH . "/Model/UserModel.php";