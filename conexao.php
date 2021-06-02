<?php 

$server = "localhost";
$user = "root";
$password = "";
$bd = "empresa";

$conn = mysqli_connect($server, $user, $password, $bd);



function mensagem($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>
            $texto
          </div>";
}

?>