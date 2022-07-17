<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/logo-nike.png" rel="icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Nike | Adicionar produto</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
  
  * { font-family: 'Inter', sans-serif !important; }
  .flex { display: flex; }
  .background-15 { background-color: rgba(217, 217, 217, 0.15);}
  .btn-cadastrar,.btn-cancelar { padding: 0.2rem 3rem!important; max-width: 10rem; }
</style>   
</head>
<body>
  <header>
    <div class="container border-bottom">
      <div class="cabecalho flex justify-content-between align-items-center px-2">
        <a href="index.php"><img src="img/logo-nike.png" width="17%"></a>
        <a href="index.php"><h6 class="fw-lighter">Ir para a Loja</h6></a>
      </div>
    </div>
  </header>
  <main>
    <div class="container">
      <h5 class="fw-normal my-3">Adicionar Produto Nike</h5>
      <fieldset class="background-15 pt-4 pb-2 px-4">
        <form action="" method="POST">
          <div class="row mb-3">
            <div class="col">
              <h6 class="fw-lighter">Descrição</h6>
              <input type="text" class="form-control fw-lighter" name="descricao" required>
            </div>
            <div class="col">
              <h6 class="fw-lighter">Imagem</h6>
              <input type="text" class="form-control fw-lighter" name="imagem" required>
            </div>
          </div>
          <div class="row mb-5 gap-3">
            <div class="col-sm-2">
              <h6 class="fw-lighter">Valor</h6>
              <input type="number" min="0" step="0.01" class="form-control fw-lighter" name="valor" placeholder="R$" required>
            </div>
            <div class="col-sm-2">
              <h6 class="fw-lighter">Máx. de Parcelas</h6>
              <input type="number" min="0" max="12" class="form-control fw-lighter" name="max_parcelas" required>
            </div>
            <div class="col-sm-2">
              <h6 class="fw-lighter">Juros (em %)</h6>
              <input type="number" min="0" max="60" class="form-control fw-lighter" name="juros" placeholder="%" required>
            </div>
            <div class="col-sm-3">
              <h6 class="fw-lighter">Categoria</h6>
              <select class="form-select fw-lighter" aria-label="Default select example" name="categoria" required> 
                <option selected disabled>Selecione</option>
                <option value="1">Camisa de time</option>
                <option value="2">Jordan</option>
                <option value="3">Atletismo</option>
                <option value="4">SNKRS</option>
              </select>
            </div>
            <div class="col-sm-2">
              <h6 class="fw-lighter">Tipo</h6>
              <select class="form-select fw-lighter" aria-label="Default select example" name="tipo" required> 
                <option selected disabled>Selecione</option>
                <option value="1">Roupa</option>
                <option value="2">Calçado</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 mb-2">
              <input type="submit" class="btn btn-primary btn-cadastrar fw-lighter" Value="Cadastrar" name="btnCadastro">
            </div>
            <div class="col-sm-2">
              <a href="adicionar-produto.php" class="btn btn-secondary btn-cancelar fw-lighter">Cancelar</a>
            </div>
          </div>
        </form>
      </fieldset>
      <?php
        if (isset($_POST['btnCadastro']))
        {
          include("conexao.php");

          $descricao = $_POST['descricao'];
          $imagem = $_POST['imagem'];
          $valor = $_POST['valor'];
          $max_parcelas = $_POST['max_parcelas'];
          $juros = $_POST['juros'];
          $categoria = $_POST['categoria'];
          $tipo = $_POST['tipo'];

          $sql_code = "SELECT descricao FROM produtos WHERE descricao = '$descricao'";

          $resultado = mysqli_query($conexao, $sql_code);

          if(!$resultado){
              die('Query Inválida: '.mysqli_error($conexao));
          }

          $quantidade = $resultado->num_rows;

          if ($quantidade == 0)
          {
            $sql_code = "SELECT * FROM produtos WHERE categoria = $categoria";

            $resultado = mysqli_query($conexao, $sql_code);
  
            if(!$resultado){
                die('Query Inválida: '.mysqli_error($conexao));
            }
  
            $quantidade = $resultado->num_rows;

            if ($quantidade < 4)
            {
              $sql_insert = "INSERT INTO produtos (descricao, imagem, valor, max_parcelas, juros, categoria, tipo)
              VALUES ('$descricao','$imagem', $valor, $max_parcelas, $juros, $categoria, $tipo)";

              $resultado = mysqli_query($conexao, $sql_insert);

              if(!$resultado){
                die('Query Inválida: '.mysqli_error($conexao));
              }
              $sql_code = "SELECT * FROM produtos WHERE descricao = '$descricao'";

              $resultado = mysqli_query($conexao, $sql_code);

              if(!$resultado){
                die('Query Inválida: '.mysqli_error($conexao));
              }

              $dados = $resultado->fetch_assoc();
              $id = $dados['id'];

              header("location: produto-adicionado.php?id=$id");
            }
            else
            {
              echo "<fieldset class='background-15 py-4 px-4 mt-5'>
                      <h6 class='fw-lighter'>Já há 4 produtos dessa categoria cadastrados. <br>
                        Exclua ao menos um para adicionar mais produtos da mesma categoria.</h6>
                    </fieldset>";
            }
          }
          else
          {
            echo "<fieldset class='background-15 py-4 px-4 mt-5'>
                      <h6 class='fw-lighter'>Produto já cadastrado. <br>
                          Tente com outra descrição.</h6>
                  </fieldset>";
          }
        }
      ?>
    </div>
  </main>
</body>
</html>