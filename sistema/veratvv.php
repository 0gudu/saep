<?php 
    require_once "conexao.php";
    $id = $_POST['id'];

    $atvv = $pdo->prepare("SELECT COUNT(*) FROM atividades WHERE turmas = :id");
    $atvv->bindParam(':id', $id);
    $atvv->execute();
    $atvvs = $atvv->fetchColumn();
    echo $atvvs;
?>