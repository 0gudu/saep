<?php 
    session_start();
    require_once "conexao.php";
    $id = $_SESSION['idprofessor'];
    $idconsult = $pdo->prepare("SELECT nome FROM professores WHERE idprofessores = :id");
    $idconsult->bindParam(':id', $id);
    $idconsult->execute();
    $nome = $idconsult->fetchColumn();

    $turmasconsult = $pdo->prepare("SELECT * FROM turmas WHERE professor = :id");
    $turmasconsult->bindParam(':id', $id);
    $turmasconsult->execute();
    $turmas = $turmasconsult->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <DIV style="display: none; width: 70%; background-color: white; position: absolute;margin: 10%; " id="confirmar">
        <p>Você tem certeza que deseja apagar a turma?</p>
        <input type="button" onclick="verificarapagar(1)" value="SIM">
        <input type="button" onclick="verificarapagar(2)" value="NÃO">
    </DIV>
        <nav data-mdb-navbar-init class="navbar bg-body shadow p-3 mb-5 bg-body rounded">
        <div class="container-fluid">
        <div class="row">
            <div class="col">
            <p class="h1" id="nome"><?=$nome?></p>
            </div>
            <div class="col">
            <form action="sair.php" method="post">
            <input type="hidden" value="<?=$id?>" name="id">
            <input type="submit" value="sair">
        </form>
            </div>
        </div>
        </div>
    
    
    
  </nav>
  <div class="container">
  <form action="cadastrart.php" method="POST">
        <input type="submit" value="CADASTRAR TURMAS">
    </form>

    <table class="table">
    <?php foreach($turmas as $c) {   ?>
            <tr>
                <td>id: <?= $c['idturmas']?> </td>
                <td>turma: <?= $c['nome']?> </td>
                <td>
                    
                    <input type="button" value="EXCLUIR" onclick="excluirturmas(<?=$c['idturmas']?>)">
                    <input type="button" value="visualizar" onclick="abrirturma(<?=$c['idturmas']?>)">
                </td>
            </tr>
        <?php } ?>
    <table>
  </div>
    
</body>
<script src="jquery-3.7.1.js"></script>
<script>
    function abrirturma(id){
        window.open("visuturma.php?id="+id,"_self");
    }

    function excluirturmas(id){
        ids = {
            id:id
        };
        idss = id;
        $("#confirmar").css("display","block");
    }

    function verificarapagar(num){
        if (num == 1){
            $.ajax({
                url: "veratvv.php",
                data: ids,
                method: "POST",
                success: function(response) {
                    console.log(response);
                    if (response != 0) {
                        alert("Você possui atividades nessa turma e por isso você não pode apagá-la");
                        verificarapagar(2);
                    } else {
                        window.open("excluirturmas.php?id=" + idss,"_self");
                    }
                }
            });
            console.log("vem");
        }else {
            $("#confirmar").css("display","none");
            console.log("sai");
        }
    }
</script>
</html>