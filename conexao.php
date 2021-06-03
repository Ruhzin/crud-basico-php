<?php 

$server = "localhost";
$user = "root";
$password = "";
$bd = "empresa";

$conn = mysqli_connect($server, $user, $password, $bd);


// algumas funções
function mensagem($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>
            $texto
          </div>";
}

function mostraData($data){
  $d = explode('-', $data);
  $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];

  return $escreve;
}


?>