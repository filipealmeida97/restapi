1° Executar o servidor interno do PHP (PHP 8):
Se você estiver na pasta do projeto, navegue até a instalção do PHP e abra por meio do diretório da instalção o prompt de comando oo o terminal,
e execute a linha ./php -S localhost:8080 -t ../caminho/do/seu/diretorio
2° URI para recuperar valores
localhost:8080/restapi/v1/user/list?limit=10
3º URI para inserir valores
localhost:8000/restapi/v1/user/insert
E posteriormente enviar via BODY por RAW o json para inserção
