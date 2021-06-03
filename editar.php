<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Alteração de cadastro</title>
  </head>
  <body>
        <?php 
        include "conexao.php";

        $id = $_GET['id'] ?? "";
        $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";
        $dados = mysqli_query($conn, $sql);

        $linha = mysqli_fetch_assoc($dados);
        
        ?>

    <div class="container">
        <h1>Editar Cadastro</h1>
            <div class="row">
                <div class="col">
                    <form action="editar_script.php" method="POST">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" name="nome"  value="<?= $linha['nome'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" name="endereco" value="<?= $linha['endereco'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" name="telefone" value="<?= $linha['telefone'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="<?= $linha['email'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="dt_nasci" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" name="dt_nasci" value="<?= $linha['data_nascimento'] ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Salvar Alterações">
                            <input type="hidden" name="id" value="<?= $linha['cod_pessoa'] ?>">
                            <a href="index.php" class="btn btn-primary" style="height: 40px;">Voltar para o inicio</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>