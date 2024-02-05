<?php
try {
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $root = 'root';
    $password = '';

    $query = '
        insert into usuario(nome, email, senha)
            values
        (:user_nome, :user_email, :user_senha)
    ';

    $conexao = new PDO($dsn, $root, $password);
    $stmt = $conexao->prepare($query);

    $stmt->bindValue(':user_nome', $_POST['nome']);
    $stmt->bindValue(':user_email', $_POST['email']);
    $stmt->bindValue(':user_senha', $_POST['senha']);
    $stmt->execute();

    $lista = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($lista);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getCode() .' - Mensagem: '. $e->getMessage(); 
}