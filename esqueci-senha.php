<?php
// session_start();
// if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
//     header('Location: home.php');
// }
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
</head>

<body>
    <div class="loading-container" id="loadingContainer">
        <div class="loading-spinner"></div>
    </div>
    <header>
        <nav class="navbar navbar-expand bg-light fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand" id="header-titulo">TaskFlow</a>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="area-esqueci-senha">
                <h1>Recuperação de senha</h1>
                <div class="form-esqueci-senha">
                    <form action="/PHP/enviar-email-esqueci-senha.php" method="post">
                        <div class="form-group">
                            <label for="email">Informe seu e-mail cadastrado:</label>
                            <input id="email" type="email" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- BOOTSTRAP 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ANIME.JS 3.2.2 -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.2"></script>
    <!-- JS -->
    <script src="js/script.js"></script>
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>