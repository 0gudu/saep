<?php 
    require_once("conexao.php");
    $idturma = $_GET['id'];
    $turma = $_GET['turma'];

    $addturma = $pdo->prepare("DELETE FROM atividades WHERE idatividades = :id");
    $addturma->bindParam(':id', $idturma);
    $addturma->execute();

    header("location: visuturma.php?id=$turma");
?>