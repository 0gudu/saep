<?php
    session_start();
    require_once("conexao.php");
    $id = $_SESSION['idprofessor'];
    $nometurma = $_POST['nome'];

    $addturma = $pdo->prepare("INSERT INTO turmas (nome, professor) VALUES (:nome, :professor)");
    $addturma->bindParam(':nome', $nometurma);
    $addturma->bindParam(':professor', $id);
    $addturma->execute();

    header("location: turmas.php");
?>