<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Lista de Tarefas</title>
</head>
<body>

    <header>
        <a href="index.html">
            <img alt="Uma prancheta com um lápis para marcação de atividades concluídas" src="https://cdn.pixabay.com/photo/2016/03/31/19/50/checklist-1295319_960_720.png" height="40" width="40">
            App Lista Tarefas
        </a>
    </header>

    <main>

        <nav>
            <ul>
                <li><a href="index.php">Tarefas pendentes</a></li>
                <li><a href="nova_tarefa.php" class="selected">Nova tarefa</a></li>
                <li><a href="todas_tarefas.php">Todas as tarefas</a></li>
            </ul>
        </nav>

        <section>
            <h1>Nova Tarefa</h1>

            <form action="recebe_tarefa.php" method="post" class="nova_tarefa">
                <label for="tarefa">Descrição da Tarefa:</label>
                <input name="tarefa" type="text" placeholder="Exemplo: Dar banho no cachorro" id="tarefa">
                <button type="submit">Cadastrar</button>
            </form>
        </section>

        
        <?php if(array_key_exists('cadastro', $_GET)){
            if($_GET['cadastro']=='sucess') { ?>
                <div class="sucesso">Tarefa cadastrada com sucesso!</div>
        <?php };
            if($_GET['cadastro']=='erro1'){ ?>
                <div class="falha">Por favor insira alguma informação!</div>
            <?php };
        }; ?>

    </main>
    
</body>
</html>

