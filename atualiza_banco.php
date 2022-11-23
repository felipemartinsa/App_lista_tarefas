<?php

    //verifica qual botão envio o comando pela propriedade name da tag button
    $id = array_keys($_POST)[0];

    //estabelece comunicação com o banco de dados
    require_once("acesso_banco.php");

    $query = "
        update tarefas
        set atividade = :atividade
        where idtarefas = :id;
    ";

    $stmt = $conexao->prepare($query);

    $stmt->bindValue(':atividade', $_POST[$id]);
    $stmt->bindValue(':id', $id);

    $stmt->execute();

    $localizacao = $_GET['site'];
    header('Location: '.$localizacao);
?>