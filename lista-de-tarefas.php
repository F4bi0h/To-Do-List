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
        where id_usuario = :id and status_tarefa = 0
    ';

    $id = $_SESSION['id'];

    $conexao = new PDO($dns, $root, $password);
    $stmt = $conexao->prepare($query);

    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <?php if(isset($_GET['tarefa']) && $_GET['tarefa'] == 'concluida') { ?>
            <div class="text-success" style="font-size: 25px;">Parabéns, você concluiu a tarefa</div>
        <?php } ?>
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
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $value) { ?>
                            <tr id="<?= $value['id_tarefa'] ?>">
                                <td>
                                    <?= $value['titulo_tarefa'] ?>
                                </td>
                                <td>
                                    <?= $value['tipo_tarefa'] ?>
                                </td>
                                <td>
                                    <?= $value['descricao'] ?>
                                </td>
                                <td>
                                    <?= date("d/m/Y", strtotime($value['data_tarefa'])) ?>
                                </td>
                                <td>
                                    <?= $status = ($value['status_tarefa'] == 0) ? 'Pedente' : 'Concluída' ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-edit">
                                                        <form action="/PHP/opcoes-tarefas/editar-tarefa.php" method="post">
                                                            <div class="form-group">
                                                                <input type="text" name="titulo-tarefa"
                                                                    class="form-control mb-2"
                                                                    value="<?= $value['titulo_tarefa'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-select mb-2" aria-label="Default select"
                                                                    name="tipo-tarefa" id="">
                                                                    <option value="">Tipo da tarefa</option>
                                                                    <option value="Compras">Compras</option>
                                                                    <option value="Esporte">Esporte</option>
                                                                    <option value="Lista de Desejos">Lista de Desejos
                                                                    </option>
                                                                    <option value="Pessoal">Pessoal</option>
                                                                    <option value="Trabalho">Trabalho</option>
                                                                    <option value="Outros">Outros</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <textarea name="descricao-tarefa" id="" cols="30" rows="4"
                                                                    class="form-control" placeholder="Descrição da tarefa"><?= $value['descricao'] ?>
                                                                    </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="date" name="data-tarefa" class="form-control"
                                                                    value="<?= $value['data_tarefa'] ?>">
                                                            </div>
                                                            <div class="form-group mt-1">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Editar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </a>
                                    <a id="btn-edit-tarefa" href="" class="btn btn-sm btn-success">
                                        <span class="material-symbols-outlined">done</span>
                                    </a>
                                    <a id="btn-delete-tarefa" href="" class="btn btn-sm btn-danger">
                                        <span class="material-symbols-outlined">delete</span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let btnDeleteTarefa = document.querySelector('#btn-delete-tarefa');
        let btnEditTarefa = document.querySelector('#btn-edit-tarefa');

        btnDeleteTarefa.addEventListener('click', (event) => {
            event.preventDefault();
            let verificar = confirm('Tem certeza que deseja excluir essa tarefa?');

            if (verificar) {
                window.location.href = '/PHP/opcoes-tarefas/excluir-tarefa.php';
            } else {
                return false;
            }
        });

        btnEditTarefa.addEventListener('click', (event) => {
            event.preventDefault();
            let verificar = confirm('Essa tarefa foi concluída?');

            if (verificar) {
                window.location.href = '/PHP/opcoes-tarefas/concluir-tarefa.php';
            } else {
                return false;
            }
        });
    </script>
</body>

</html>