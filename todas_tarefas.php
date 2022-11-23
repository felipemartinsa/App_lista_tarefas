<?php
    require_once("acesso_banco.php");

    //recuperando todos os registro
    $query = "
        select * from tarefas;
    ";

    $stmt = $conexao->query($query);
    $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="app.js"></script>
    <title>Lista de Tarefas</title>
</head>
<body>

    <header>
        <a href="index.html">
            <img alt="Uma prancheta com um lápis para marcação de atividades concluídas" src="https://cdn.pixabay.com/photo/2016/03/31/19/50/checklist-1295319_960_720.png" height="40" width="40">
            App Lista de Tarefas
        </a>
    </header>

    <main>
        <nav>
            <ul>
                <li><a href="index.php">Tarefas pendentes</a></li>
                <li><a href="nova_tarefa.php">Nova tarefa</a></li>
                <li><a class="selected" href="">Todas as tarefas</a></li>
            </ul>
        </nav>

        <section>
            <h1>Todas as tarefas</h1>

            <?php foreach ($tarefas as $tarefa) { 
                if ($tarefa['status'] == 'realizada') {
                    $tarefa['atividade'] .= ' (realizada)';
                }
                ?>

                <div class="todas_tarefas">
                    <div class="preenche">
                        <div><?= $tarefa['atividade'] ?></div>
                        <form method="post" action="atualiza_banco.php?site=todas_tarefas.php" class="atualiza oculto" id=<?= $tarefa['idtarefas'] ?>>
                            <input type="text" name=<?= $tarefa['idtarefas'] ?> value = "<?= $tarefa['atividade'] ?>"/>
                            <button type="submit">Atualizar</button>
                        </form>
                    </div>
                    <div class="botoes">
                        <form method="post" action="modifica_banco.php?site=todas_tarefas.php"><button type="submit" name="descarta" value=<?= $tarefa['idtarefas'] ?>><i class="fa fa-trash-o" aria-hidden="true" style="color: red;"></i></button></form>
                        <?php if($tarefa['status']=='pendente') { ?>
                            <button onClick="abrirAtualizacao(<?= $tarefa['idtarefas'] ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: blue;"></i></button>
                            <form method="post" action="modifica_banco.php?site=todas_tarefas.php"><button type="submit" name="realiza" value=<?= $tarefa['idtarefas'] ?>><i class="fa fa-check-square" aria-hidden="true" style="color: green"></i></button></form>
                        <?php }; ?>
                        
                    </div>
                </div>
            <?php }; ?>

        </section>
    </main>
    
</body>
</html>