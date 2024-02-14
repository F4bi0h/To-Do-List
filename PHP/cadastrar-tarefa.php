<?php
session_start();
try {
    $dns = 'mysql:host=localhost;dbname=TODOLIST';
    $root = 'root';
    $password = '';

    $conexao = new PDO($dns, $root, $password);

    $query = '
            insert into tarefa(id_usuario, titulo_tarefa, descricao, data_tarefa, tipo_tarefa)
                values
            (:id, :titulo, :descricao, :data, :tipo)
        ';

    $usuario = $_SESSION['id'];
    $tituloTarefa = $_POST['titulo-tarefa'];
    $tipoTarefa = $_POST['tipo-tarefa'];
    $descricaoTarefa = $_POST['descricao-tarefa'];
    $dataTarefa = $_POST['data-tarefa'];

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':id', $usuario);
    $stmt->bindValue(':titulo', $tituloTarefa);
    $stmt->bindValue(':tipo', $tipoTarefa);
    $stmt->bindValue(':descricao', $descricaoTarefa);
    $stmt->bindValue(':data', $dataTarefa);
    
    $stmt->execute();

    header('Location: ../home.php?tarefa=cadastrada');


} catch (PDOException $e) {
    echo 'ERRO:' . $e->getCode() . ' / ' . 'MENSAGEM: ' . $e->getMessage();
}
