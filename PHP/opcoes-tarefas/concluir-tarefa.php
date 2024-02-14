<?php
session_start();
try {
    $dns = 'mysql:host=localhost;dbname=TODOLIST';
    $root = 'root';
    $password = '';

    $query = '
        update
            tarefa
        set 
            status_tarefa = 1
        where
            id_tarefa = :id
    ';

    $conexao = new PDO($dns, $root, $password);
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':id', $_SESSION['id']);
    $stmt->execute();

    header('Location: ../../lista-de-tarefas.php?tarefa=concluida');

} catch (PDOException $e) {
    echo 'ERRO:' . $e->getCode() . ' / ' . 'MENSAGEM: ' . $e->getMessage();
}