<?php 
    $turma = $_GET['turma'];
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
    <div class="container">
    
    <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card bg-white">
              <div class="card-body p-5">
                <form action="atvvcadrast.php" method="POST" class="mb-3 mt-md-4">
                  <h2 class="fw-bold mb-2 text-uppercase ">Insira o nome da atividade</h2>
                  <div class="mb-3">
                    <label for="email" class="form-label ">Nome da Atividade</label>
                    <input type="text" class="form-control" id="email" name="nome">
                    <input type="hidden" name="turma" value="<?=$turma?>">
                  </div>
                  <div class="d-grid">
                    <button class="btn btn-outline-dark" type="submit">Enviar</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</body>
</html>