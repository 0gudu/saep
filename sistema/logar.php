<?php
    require_once "conexao.php";
    session_start();    

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // verifica se existe uma conta com o mesmo email e senha
    $login = $pdo->prepare("SELECT COUNT(*) FROM professores WHERE email = :email AND senha = :senha");
    $login->bindParam(':email', $email);
    $login->bindParam(':senha', $senha);
    $login->execute();
    $resp = $login->fetchColumn();

    if ($resp != 0) {
        // associa o email e senha com o id do professor e realiza o início da sessão
        $idconsult = $pdo->prepare("SELECT idprofessores FROM professores WHERE email = :email AND senha = :senha");
        $idconsult->bindParam(':email', $email);
        $idconsult->bindParam(':senha', $senha);
        $idconsult->execute();
        $id = $idconsult->fetchColumn();
        $_SESSION['idprofessor'] = $id;

        header("location: turmas.php");
    } else {
        header('location: index.php');
    }
?>
