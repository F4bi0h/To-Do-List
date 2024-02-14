<?php
session_start();
$_SESSION['autenticado'] = false;

try {
    if (!empty($_POST["email"]) && !empty($_POST["senha"])) {
        $dsn = 'mysql:host=localhost;dbname=TODOLIST';
        $root = 'root';
        $password = '';

        $query = '
            select
                *
            from
                usuario
            where
                email = :user_email AND senha =  MD5(:user_senha)
        ';

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $conexao = new PDO($dsn, $root, $password);
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':user_email', $email);
        $stmt->bindValue(':user_senha', $senha);
        $stmt->execute();

        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($lista as $value) {
            $idUsuario = $value['id'];
        }

        if($stmt->rowCount() == 1) {
            $_SESSION['autenticado'] = true;
            header('Location: ../../home.php?usuario='.$idUsuario);
        } else {
            $_SESSION['autenticado'] = false;
            header('Location: ../../index.php?usuario=erro');
        }
    }

} catch (PDOException $e) {
    echo 'ERRO: ' . $e->getCode() . ' / ' . 'MENSAGEM: ' . $e->getMessage();
}
