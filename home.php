<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster</title>

    <!-- BOOTSTRAP 5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TaskMaster</a>
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
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
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
            <div class="area-cadastrar-tarefa">
                <div class="img-cadastrar-tarefa">
                    <img src="/SVG/undraw_online_organizer_re_156n.svg" alt="">
                </div>
                <div class="form-cadastrar-tarefa">
                    <h2>Cadastrar nova tarefa</h2>
                    <form action="/PHP/cadastrar-tarefa.php" method="post">
                        <div class="form-group">
                            <input type="text" name="titulo-tarefa" class="form-control mb-2" placeholder="Titulo da tarefa">
                        </div>
                        <div class="form-group">
                            <select class="form-select mb-2" aria-label="Default select" name="tipo-tarefa" id="">
                                <option value="">Tipo da tarefa</option>
                                <option value="1">Compras</option>
                                <option value="2">Esporte</option>
                                <option value="3">Lista de Desejos</option>
                                <option value="4">Pessoal</option>
                                <option value="5">Trabalho</option>
                                <option value="6">Outros</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Descrição da tarefa"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control">
                        </div>
                        <div class="d-grid mt-1">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>