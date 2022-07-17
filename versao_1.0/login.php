<?php
  include ("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/logo-nike.png" rel="icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Nike | Login</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
  
  * { font-family: 'Inter', sans-serif !important; }
  .flex { display: flex; }
  .background-15 { background-color: rgba(217, 217, 217, 0.15);}

</style>   
</head>
<body>
  <header>
    <div class="container border-bottom">
      <div class="cabecalho flex justify-content-between align-items-center px-2">
        <a href="index.php"><img src="img/logo-nike.png" width="17%"></a>
        <a href="login.php"><h6 class="fw-lighter">Login</h6></a>
      </div>
    </div>
  </header>
  <main>
    <div class="container col-sm-4 background-15 mt-4 px-4 py-4">
      <form action="" method="post">
        <div class="col mb-3">
          <h6 class="fw-lighter">Usuário</h6>
          <input type="text" class="form-control fw-lighter" name="usuario" required>
        </div>
        <div class="col mb-3">
          <h6 class="fw-lighter">Senha</h6>
          <input type="password" class="form-control fw-lighter" name="senha" required>
        </div>
        <div class="col">
          <input type="submit" class="btn btn-primary" name="btn-login" id="btn-login" value="Entrar">
        </div>
      </form>
    </div>
    <?php
      if (isset($_POST['btn-login']))
      {
        include("conexao.php");

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM usuarios WHERE usuario ='$usuario'";

        $resultado = mysqli_query($conexao, $sql_code);

        if(!$resultado){
            die('Query Inválida: '.mysqli_error($conexao));
        }

        $quantidade = $resultado->num_rows;

        if ($quantidade == 0)
        {
          echo "<div class='container col-sm-4 background-15 mt-4 px-4 py-4'>
                  <h6 class='fw-light'>Usuário não cadastrado.</h6>
                </div>";
        }
        else
        {
          $sql_code = "SELECT * FROM usuarios WHERE usuario ='$usuario' AND senha = '$senha'";
          
          $resultado = mysqli_query($conexao, $sql_code);

          if(!$resultado){
              die('Query Inválida: '.mysqli_error($conexao));
          }

          $quantidade = $resultado->num_rows;

          if ($quantidade == 0)
          {
            echo "<div class='container col-sm-4 background-15 mt-4 px-4 py-4'>
                    <h6 class='fw-light'>Senha incorreta.</h6>
                  </div>";
          }
          else
          {
            header("location: adicionar-produto.php");
          }
        }
      }
    ?>
  </main>
</body>
</html>