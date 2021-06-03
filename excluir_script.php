<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  
    <title>Exclusão de cadastro</title>
  </head>
  <body>
  <div class="container">
        <div class="row">
            <?php 
                include "conexao.php";

                $id = $_POST['id'];
                $nome = $_POST['nome'];


                    $sql = "DELETE FROM `pessoas` WHERE cod_pessoa = $id";


                    //analisa a query para verificar se foi cadastrado, e usa uma função com bootstrap para retornar se sucesso ou não alterando a cor do alert
                    if (mysqli_query($conn, $sql)) {
                        mensagem("$nome foi excluído com sucesso !",'success');
                    } else {
                        mensagem("$nome Não foi excluído !",'danger');
                    }
            ?>
            <a href="index.php" class="btn btn-primary" style="width: 80px;">Voltar</a>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>