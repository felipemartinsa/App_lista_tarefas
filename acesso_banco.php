<?php
//estabelecendo conexão com o banco de dados
    $dsn = 'mysql:host=localhost;dbname=app_lista_tarefas';
    $usuario = 'root';
    $senha= '1234';

    $conexao = new PDO($dsn,$usuario,$senha);
?>