<?php
    try {
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

        echo '<pre>';
            print_r($lista);
        echo '<pre>';

    } catch(PDOException $e) {
        echo 'ERRO: ' . $e->getCode() . ' / ' . 'MENSAGEM: ' . $e->getMessage();
    }
