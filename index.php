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
    <header>
        <nav class="navbar navbar-expand bg-light fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand" id="header-titulo">TaskMaster</a>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="area-login">
                <div class="form-login">
                    <h1>Login</h1>
                    <form action="/PHP/validações/validar-login.php" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control mb-3" placeholder="Digite seu e-mail"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="senha" class="form-control mb-3" placeholder="Digite sua senha"
                                required>
                        </div>
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-primary btn-block">Acessar</button>
                        </div>
                        <a href="cadastro.php"
                            class="link-offset-2 link-underline link-underline-opacity-0 text-primary">Cadastrar</a>
                    </form>
                </div>
                <div class="area-info">
                    <div class="info-task">
                        <h1>TaskMaster - Seu Parceiro de Produtividade</h1>
                        <p>
                            TaskMaster é o sua plataforma essencial de To-Do List, projetado para simplificar e
                            aprimorar sua gestão de tarefas diárias. Organize sua vida de maneira eficiente, mantenha-se
                            focado e alcance suas metas com facilidade.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- BOOTSTRAP 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ANIME.JS 3.2.2 -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.2"></script>

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
            targets: '.form-login',
            translateX: -50,
            delay: 100,
            direction: 'alternate',
            loop: 1,
            easing: 'easeInOutCirc'
        });

        window.addEventListener('load', () => {
            let infoTask = document.querySelector('.info-task');
            let formLogin = document.querySelector('.form-login');
            infoTask.style.opacity = 1;
            formLogin.style.opacity = 1;
        })
    </script>
</body>

</html>