<?php
    require_once("conexao.php");
    $idturma = $_GET['id'];


    $addturma = $pdo->prepare("DELETE FROM turmas WHERE idturmas = :id");
    $addturma->bindParam(':id', $idturma);
    $addturma->execute();

    header("location: turmas.php");
?>