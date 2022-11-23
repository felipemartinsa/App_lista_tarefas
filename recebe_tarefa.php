<?php

    //Estabelecendo conexão com o banco de dados
    $dsn = 'mysql:host=localhost;dbname=app_lista_tarefas';
    $usuario = 'root';
    $senha= '1234';

    $conexao = new PDO($dsn,$usuario,$senha);
    
    //Criando tabela
   /*$query = "
        create table tarefas (
            idtarefas int primary key auto_increment,
            atividade text not null,
            status enum('pendente','realizada') not null
        );
    ";

    $conexao->exec($query);*/

    //Inserindo dados
    if(!empty($_POST['tarefa'])){
        $status = 'pendente';
        $id = 'null';
        $tarefa = $_POST['tarefa'];

        $query = "
        insert into tarefas values ($id,:tarefa,'$status');  
        ";

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':tarefa',$tarefa);
        $stmt->execute();

        header('Location:nova_tarefa.php?cadastro=sucess');
    }else{
        header('Location:nova_tarefa.php?cadastro=erro1');
    }
?>