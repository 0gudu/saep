<?php
    session_start();
    require_once("conexao.php");

    $idprofessor = $_SESSION['idprofessor'];
    $nomeatvv = $_POST['nome'];
    $turma = $_POST['turma'];

    $addturma = $pdo->prepare("INSERT INTO atividades (titulo, turmas, professor) VALUES (:nome, :turma, :professor)");
    $addturma->bindParam(':nome', $nomeatvv);
    $addturma->bindParam(':turma', $turma);
    $addturma->bindParam(':professor', $idprofessor);
    $addturma->execute();

    header("location: visuturma.php?id=$turma");
?>