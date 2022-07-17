<?php

$nome_servidor = "localhost";
$nome_usuario = "root";
$senha = "";
$nome_banco = "bd";

$conexao = mysqli_connect($nome_servidor,$nome_usuario,$senha,$nome_banco );

if (mysqli_connect_errno()) {
    
    echo "Falha na conexão; " . mysqli_connect_errno();
}
else {
    echo "";
}
/*mysqli_close($conexao);
echo "Conexão fechada.<br>";*/
?>