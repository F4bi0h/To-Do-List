<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

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
    <div class="loading-container" id="loadingContainer">
        <div class="loading-spinner"></div>
    </div>
    <header>
        <nav class="navbar navbar-expand bg-light fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">TaskMaster</a>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="area-form-cadastro">
                <div class="area-info">
                    <div class="info-task">
                        <h1>TaskMaster - Seu Parceiro de Produtividade</h1>
                        <p>
                            Maximize a Produtividade! Junte-se ao TaskMaster agora para conquistar seus objetivos com
                            eficiência. Registre-se hoje e transforme cada tarefa em uma vitória pessoal. Cadastre-se
                            já!
                        </p>
                        <div class="img-cadastro">
                            <img src="/SVG/undraw_sign_up_n6im.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-cadastro">
                    <h1>Faça seu cadastro</h1>
                    <form action="/PHP/validações/validar-cadastro.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nome" class="form-control mb-3" placeholder="Digite seu nome"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control mb-3" placeholder="Digite seu e-mail"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="senha" class="form-control mb-3" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="A senha deve ter no mínimo 8 caracteres, incluindo pelo menos uma letra e um número" placeholder="Digite sua senha"
                                required>
                        </div>
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                        </div>
                        <?php if (isset($_GET['usuario']) && $_GET['usuario'] == 'existe') { ?>
                            <div class="text-warning" style="display: block;">Usuário já cadastrado.</div>
                        <?php } ?>
                        <a href="index.php"
                            class="link-offset-2 link-underline link-underline-opacity-0 text-primary">Faça Login</a>
                    </form>
                </div>
            </div>
            </div>
        </section>
    </main>

    <!-- BOOTSTRAP 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ANIME.JS 3.2.2 -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.2"></script>
    <script src="js/script.js"></script>

    <script>
        anime({
            targets: '.info-task',
            translateX: -50,
            delay: 100,
            direction: 'alternate',
            loop: 1,
            easing: 'easeInOutCirc'
        });

        anime({
            targets: '.form-cadastro',
            translateX: -50,
            delay: 100,
            direction: 'alternate',
            loop: 1,
            easing: 'easeInOutCirc'
        });

        window.addEventListener('load', () => {
            let infoTask = document.querySelector('.info-task');
            let formCadastro = document.querySelector('.form-cadastro');
            infoTask.style.opacity = 1;
            formCadastro.style.opacity = 1;
        })
    </script>
</body>

</html>