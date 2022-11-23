<?php
    //verifica qual botão envio o comando pela propriedade name da tag button
    $comando = array_keys($_POST)[0];

    //estabelece comunicação com o banco de dados
    require_once("acesso_banco.php");
    
    switch($comando) {
        case 'descarta':
            $query = "
                delete from tarefas
                where idtarefas = :id;
            ";

            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':id', $_POST[$comando]);
            $stmt->execute();

            $localizacao = $_GET['site'];
            header('Location: '.$localizacao);
            break;

        case 'realiza':
            $query = "
                update tarefas
                set status = 'realizada'
                where idtarefas = :id;
            ";

            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':id', $_POST[$comando]);
            $stmt->execute();

            $localizacao = $_GET['site'];
            header('Location: '.$localizacao);
            break;
    };
?>