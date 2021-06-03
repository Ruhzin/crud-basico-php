<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Empresa</title>
  </head>
    <?php 
        include "conexao.php";
            
        
        $pesquisa = $_POST['busca'] ?? '';

        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";
        $dados = mysqli_query($conn,$sql);


    ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                        <h1>Pesquisa</h1>
                        <br>
                        <nav class="navbar navbar-light bg-light">
                            <div class="container-fluid">
                                <form class="d-flex" action="pesquisa.php" method="POST">
                                    <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                                </form>
                            </div>
                        </nav>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Endereço</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Data de Nascimento</th>
                                            <th scope="col">Acão</th>
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
                                $dt_nasci = mostraData($dt_nasci);

                                echo "<tr>
                                    <th scope='row'>$nome</th>
                                        <td>$endereco</td>
                                        <td>$telefone</td>
                                        <td>$email</td>
                                        <td>$dt_nasci</td>
                                        <td>
                                            <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirma'
                                            onclick=" .'"' ."pegar_dados($cod_pessoa, '$nome')" .'"' .">Excluir</a>
                                            <a href='editar.php?id=$cod_pessoa' class='btn btn-success'>Editar</a>
                                        </td>
                                    </tr>";

                            }
                        ?>
                                    </tbody>
                                </table>

                <a href="index.php" class="btn btn-primary" style="height: 40px;">Voltar para o inicio</a>
                
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="excluir_script.php" method="POST">
                                <p>Deseja realmente excluir ? <b id="nome_pessoa">Nome: </b> </p>
                                
                    </div>
                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                <input type="hidden" name="id" id="cod_pessoa" value="">
                                <input type="hidden" name="nome" id="nome_pessoa_1" value="">
                                <input type="submit"  class="btn btn-danger" value="Sim">
                    </div>
                        </form>
            </div>
        </div>
    </div>

<script>
    function pegar_dados(id,nome){
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('cod_pessoa').value = id;
        document.getElementById('nome_pessoa_1').value = nome;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>