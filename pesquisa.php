<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Empresa</title>
  </head>
  <body>

    <?php 
        include "conexao.php";
            
        
        $pesquisa = $_POST['busca'] ?? '';

        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";
        $dados = mysqli_query($conn,$sql);
    ?>



  <div class="container">
        <div class="row">
            <div class="col">
                <h4>Pesquisa</h4>
                        <nav class="navbar navbar-light bg-light">
                             <form class="form-inline" action="pesquisar.php" method="POST">
                                  <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Search" name="busca">
                                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                             </form>
                        </nav>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Data de Nascimento</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php
                    while( $linha = mysqli_fetch_assoc($dados)){
                        $cod_pessoa = $linha['cod_pessoa'];
                        $nome = $linha['nome'];
                        $endereco = $linha['endereco'];
                        $telefone = $linha['telefone'];
                        $email = $linha['email'];
                        $dt_nasci = $linha['data_nascimento'];

                        echo "<tr>
                            <th scope='row'>$nome</th>
                                <td>$endereco</td>
                                <td>$telefone</td>
                                <td>$email</td>
                                <td>$dt_nasci</td>
                            </tr>";

                    }
                ?>
                            </tbody>
                        </table>

                <a href="index.php" class="btn btn-primary" style="height: 40px;">Voltar para o inicio</a>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>