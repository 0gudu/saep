<?php 
    session_start();
    require_once "conexao.php";
    $idturma = $_GET['id'];
    $id = $_SESSION['idprofessor'];
    $idconsult = $pdo->prepare("SELECT nome FROM professores WHERE idprofessores = :id");
    $idconsult->bindParam(':id', $id);
    $idconsult->execute();
    $nome = $idconsult->fetchColumn();

    $turmanome = $pdo->prepare("SELECT nome FROM turmas WHERE idturmas = :id");
    $turmanome->bindParam(':id', $idturma);
    $turmanome->execute();
    $turmanomes = $turmanome->fetchColumn();

    $atvvs = $pdo->prepare("SELECT * FROM atividades WHERE professor = :id AND turmas = :turma");
    $atvvs->bindParam(':id', $id);
    $atvvs->bindParam(':turma', $idturma);
    $atvvs->execute();
    $atvv = $atvvs->fetchAll(PDO::FETCH_ASSOC);
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
    <DIV style="display: none; width: 100%; background-color: white; position: absolute;margin: 10%; " id="confirmar">
        <p>Você tem certeza que deseja apagar a atividade?</p>
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
            
        </form>
            </div>
        </div>
        </div>
</nav>
    <input type="button" value="Voltar para ver turmas" onclick="verturmas()"><br>
        
    
    <div class="container">
        
    <input type="button" value="CADASTRAR ATIVIDADE" onclick="cadastraratvv(<?=$idturma?>)">
    <P>Nome da turma: <?=$turmanomes?></P>
    <table class="table">
    <?php foreach($atvv as $c) {   ?>
            <tr>
                <td>id: <?= $c['idatividades']?> </td>
                <td><?= $c['titulo']?> </td>
                <td>
                    
                    <input type="button" value="EXCLUIR" onclick="excluiratvv(<?=$c['idatividades']?>)">
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    
    
    
</body>
<script src="jquery-3.7.1.js"></script>
<script>
    function verturmas(){
        window.open("turmas.php",'_self');
    }
    $("#nome").click(function(){
        window.open("turmas.php",'_self');
    });

    function cadastraratvv(turma) {
        window.open("cadastraratvv.php?turma="+turma,"_self");
    }
    function excluiratvv(id){
        ids = {
            id:id
        };
        idss = id;
        console.log(idss);
        $("#confirmar").css("display","block");
    }

    function verificarapagar(num){
        if (num == 1){  
            window.open("excluiratvv.php?id=" + idss + "&turma="+ <?=$idturma?>,"_self");

        }else {
            $("#confirmar").css("display","none");
        }
    }
</script>
</html>