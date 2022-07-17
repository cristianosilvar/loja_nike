<?php
  include ("conexao.php");

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];

    $sql_code = "SELECT * FROM produtos WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql_code);

    if(!$resultado){
        die('Query Inválida: '.mysqli_error($conexao));
    }
    
    $dados = $resultado->fetch_assoc();
  }
?>
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
</style>   
</head>
<body>
  <header>
    <div class="container border-bottom">
      <div class="cabecalho flex justify-content-between align-items-center px-2">
        <img src="img/logo-nike.png" width="8%">
        <a href="index.php"><h6 class="fw-lighter">Ir para a Loja</h6></a>
      </div>
    </div>
  </header>
  <main>
    <div class="container">
      <h5 class="fw-normal my-3">Produto adicionado</h5>
      <fieldset class="background-15 py-2 px-4 mb-4">
          <div class="row mb-3">
            <div class="col-sm-3">
              <img src="<?= $dados['imagem'] ?>" width="100%" class="border">
            </div>
            <div class="col-auto">
              <h6><?= $dados['descricao'] ?></h6>
              <h6>R$ <?= number_format($dados['valor'],2,',','.') ?></h6>
              <h6 class="fw-lighter mb-4">em até <font class="fw-bold"><?= $dados['max_parcelas'] ?>x</font>,
                <?php if ($dados['juros'] == 0) 
                       { echo " sem juros"; }
                      else 
                       { echo " com juros de <font class='fw-bold'>".$dados['juros']."%</font>"; } 
                ?>
              </h6>
              <h6>Categoria:
                <font class="fw-lighter">
                  <?php  
                    $categoria = $dados['categoria']; 
                    if ($categoria == 1) { echo "Camisa de time";}
                    if ($categoria == 2) { echo "Jordan";}
                    if ($categoria == 3) { echo "Atletismo";}
                    if ($categoria == 4) { echo "SNKRS";}
                  ?>
                </font>
              </h6>
              <h6>Tipo:
                <font class="fw-lighter">
                  <?php  
                    $tipo = $dados['tipo']; 
                    if ($tipo == 1) { echo "Roupa";}
                    if ($tipo == 2) { echo "Calçado";}
                  ?>
                </font>
              </h6>
            </div>
          </div>
      </fieldset>
      <div class="row">
        <div class="col-sm-3">
          <a href="adicionar-produto.php" class="btn btn-primary">Adicionar Produto</a>
        </div>
      </div>
    </div>
  </main>
</body>
</html>