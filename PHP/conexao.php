<?php
    try {
        $dns = 'mysql:host=localhost;dbname=TODOLIST';
        $root = 'root';
        $password = '';

        $conexao = new PDO($dns, $root, $password);
    } catch(PDOException $e) {
        echo 'ERRO:' . $e->getCode() . ' / ' . 'MENSAGEM: ' . $e->getMessage();
    }
