<?php
session_start();
if ($_SESSION['autenticado'] == false) {
    header('Location: index.php?usuario=nao-autenticado');
}

try {
    $dns = 'mysql:host=localhost;dbname=TODOLIST';
    $root = 'root';
    $password = '';

    $query = '
        select
            id_tarefa,
            titulo_tarefa,
            tipo_tarefa,
            descricao,
            data_tarefa,
            status_tarefa
        from
            tarefa
        where id_usuario = :id and status_tarefa = 1
    ';

    $conexao = new PDO($dns, $root, $password);
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':id', $_SESSION['id']);
    $stmt->execute();

    $tarefasConcluidas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

} catch (PDOException $e) {
    echo 'ERRO:' . $e->getCode() . ' / ' . 'MENSAGEM: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow</title>

    <!-- BOOTSTRAP 5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- GOOGLE ICONS -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="loading-container" id="loadingContainer">
        <div class="loading-spinner"></div>
    </div>
    <header>
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TaskFlow</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#canvas-toggler"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="canvas-toggler"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="lista-de-tarefas.php">Pendentes</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="tarefas-concluidas.php" class="nav-link">Concluídas</a>
                            </li>
                            <li class="nav-item">
                                <a href="/PHP/sair.php" class="nav-link">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="area-tarefas">
                <table class="table table-sm table-dark table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Tipo da Tarefa</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tarefasConcluidas as $value) { ?>
                            <tr id="<?= $value['id_tarefa'] ?>">
                                <td><?= $value['titulo_tarefa'] ?></td>
                                <td><?= $value['tipo_tarefa'] ?></td>
                                <td><?= $value['descricao'] ?></td>
                                <td><?= date("d/m/Y", strtotime($value['data_tarefa'])) ?></td>
                                <td><?= $status = ($value['status_tarefa'] == 0) ? 'Pedente' : 'Concluída' ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>