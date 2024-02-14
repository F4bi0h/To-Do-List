<?php
session_start();
try {
    $dns = 'mysql:host=localhost;dbname=TODOLIST';
    $root = 'root';
    $password = '';

    $query = '
        delete from
            tarefa
        where id_tarefa = :id    
    ';

    
    $conexao = new PDO($dns, $root, $password);
    $stmt = $conexao->prepare($query);

    

} catch (PDOException $e) {
    echo 'ERRO:' . $e->getCode() . ' / ' . 'MENSAGEM: ' . $e->getMessage();
}