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
    <title>Nike | <?= $dados['descricao'] ?></title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
  
  * { font-family: 'Inter', sans-serif !important; }
  .flex { display: flex; }
  .background-15 { background-color: rgba(217, 217, 217, 0.15);}
  .btn-pag-prod, .btn-pag-prod-bloq { padding: 0.2rem 5rem!important; max-width: 14rem; }
    
  .btn-pag-prod-bloq:hover { cursor: not-allowed !important;}
  .btn-pag-prod-bloq:checked + .btn-pag-prod-bloq, .btn-pag-prod-bloq:active + .btn-pag-prod-bloq, .btn-pag-prod-bloq:active, .btn-pag-prod-bloq.active, .show > .btn-pag-prod-bloq.dropdown-toggle {
    color: #fff !important;
    background-color: #000000 !important;
    border-color: #ffffff00 !important;
  }

  .btn-small { padding: 0.3rem 1.25rem; }
  .imagem-produto { border-left: 4px solid rgb(0,0,0) !important;}
</style>   
</head>
<body>
  <header>
    <div class="container">
      <div class="cabecalho flex justify-content-between align-items-center px-2">
        <a href="index.php"><img src="img/logo-nike.png" width="17%"></a>
        <a href="login.php"><h6 class="fw-lighter">Login</h6></a>
      </div>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="border-top"></div>
      <fieldset class="background-15 py-2 px-4 mb-5 mt-4">
        <div class="row">
          <div class="col-sm-4">
            <img src="<?= $dados['imagem'] ?>" width="100%" class="imagem-produto border mb-2">
            <h6 class="fw-light">*Produto indisponível no estoque.</h6>
          </div>
          <div class="col-8 px-2">
            <div class="border-bottom mb-3">
              <h6 class="fw-normal"><?= $dados['descricao'] ?></h6>
            </div>
            <?php 
              $valor = $dados['valor'];

              if ($dados['juros'] == 0)
              {
                $valor_parcela = $valor / $dados['max_parcelas'];
              }
              else
              {
                $valor_novo = $valor + ($valor * ($dados['juros'] / 100));

                $valor_parcela = $valor_novo / $dados['max_parcelas'];
              }
            ?>
            <h5 class="fw-bolder">R$ <?= number_format($valor,2,",",".") ?></h5>
            <h6 class="fw-light">em até <font class="fw-bolder"><?= $dados['max_parcelas']?>x</font> de <font class="fw-bolder">R$ <?= number_format($valor_parcela,2,",",".") ?></font></h6>

            <?php 
            if ($dados['tipo'] == 1)   
            {
              echo "<div class='btn-group mb-5' role='group' aria-label='Basic radio toggle button group'>        
                <input type='radio' class='btn-check' name='btnradio' id='btnradio' autocomplete='off' checked>
                <label class='btn btn-primary btn-small' for='btnradio'>P</label>
                          
                <input type='radio' class='btn-check' name='btnradio' id='btnradio2' autocomplete='off'>
                <label class='btn btn-primary btn-small' for='btnradio2'>M</label>
                          
                <input type='radio' class='btn-check' name='btnradio' id='btnradio3' autocomplete='off'>
                <label class='btn btn-primary btn-small' for='btnradio3'>G</label>

                <input type='radio' class='btn-check' name='btnradio' id='btnradio4' autocomplete='off'   checked>
                <label class='btn btn-primary btn-small' for='btnradio4'>GG</label>
              </div>";
            }
            if ($dados['tipo'] == 2)   
            {
              echo "<div class='btn-group mb-5' role='group' aria-label='Basic radio toggle button group'>        
                <input type='radio' class='btn-check' name='btnradio' id='btnradio' autocomplete='off' checked>
                <label class='btn btn-primary btn-small' for='btnradio'>37</label>
                          
                <input type='radio' class='btn-check' name='btnradio' id='btnradio2' autocomplete='off'>
                <label class='btn btn-primary btn-small' for='btnradio2'>38</label>
                          
                <input type='radio' class='btn-check' name='btnradio' id='btnradio3' autocomplete='off'>
                <label class='btn btn-primary btn-small' for='btnradio3'>39</label>

                <input type='radio' class='btn-check' name='btnradio' id='btnradio4' autocomplete='off' checked>
                <label class='btn btn-primary btn-small' for='btnradio4'>40</label>
                <input type='radio' class='btn-check' name='btnradio' id='btnradio5' autocomplete='off' checked>
                <label class='btn btn-primary btn-small' for='btnradio5'>41</label>
                
                <input type='radio' class='btn-check' name='btnradio' id='btnradio6' autocomplete='off' checked>
                <label class='btn btn-primary btn-small' for='btnradio6'>42</label>
              </div>";
            }
            ?>

            <div class="col-sm-12 mb-2">
              <a class="btn btn-primary btn-pag-prod-bloq fw-lighter">Comprar</a>
            </div>
            <div class="col-sm-12">
              <a class="btn btn-secondary btn-pag-prod fw-lighter">Favoritos</a>
            </div>
          </div>
        </div>
      </fieldset>
    </div>
  </main>
</body>
</html>