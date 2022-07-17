<?php
  include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/logo-nike.png" rel="icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Nike | Artigos esportivos e casuais</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
  
  * { font-family: 'Inter', sans-serif !important; }
  .flex { display: flex; }
  .background-15 { background-color: rgba(217, 217, 217, 0.15);}
  .background-10 { background-color: rgba(217, 217, 217, 0.1);}
  .img-lg-nike { width: 8%; min-width: 4rem; }
  .img-lg-categorias { width: 2.9rem; opacity: .85; }
  .img-lg-categorias:hover { opacity: 1; }
  .produto-imagem:hover {opacity: .8; border: 1px solid rgba(0,0,0,.1);}
</style>   
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <a name="topo"></a>
  <header>
    <div class="container">
      <div class="cabecalho flex justify-content-between align-items-center px-4">
        <a href="index.php"><img src="img/logo-nike.png" width="17%"></a>
        <a href="login.php"><h6 class="fw-lighter">Login</h6></a>
      </div>
    </div>
  </header>
  <main>
    <section>
      <div class="container">
        <div class="background-15 px-3 py-3 border-top">
          <div class="col-sm-5">
            <div class="row gap-4">
              <a href="#jordan" class="col-sm-1" >
                <img src="img/jordan-logo.png" alt="Logotipo da Jordan" class="img-lg-categorias">
              </a>
              <a href="#snkrs" class="col-sm-1" >
                <img src="img/snkrs-logo.png" alt="Logotipo da SNKRS" class="img-lg-categorias">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <a href="#camisas-time"><img src="img/banner-carousel-camisetapsg.png" class="d-block w-100" alt="..."></a>
              <div class="carousel-caption d-none d-md-block">
                <div class="carousel-titulo" align="right">
                  <h5 class="fw-bolder">Camisas de Time</h5>
                </div>
                <div class="carousel-subtitulo" align="right">
                  <h6 class="fw-normal">Compre a camiseta do seu clube do coração</h6>
                </div> 
              </div>
            </div>
            <div class="carousel-item">
              <a href="#jordan"><img src="img/banner-carousel-jordan.png" class="d-block w-100" alt="..."></a>
              <div class="carousel-caption d-none d-md-block">
                <div class="carousel-titulo" align="right">
                  <h5 class="fw-bolder">Jordan</h5>
                </div>
                <div class="carousel-subtitulo" align="right">
                  <h6 class="fw-normal">Veja os artigos da Jordan</h6>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <a href="#atletismo"><img src="img/banner-carousel-corrida.png" class="d-block w-100" alt="..."></a>
              <div class="carousel-caption d-none d-md-block">
                <div class="carousel-titulo" align="right">
                  <h5 class="fw-bolder">Atletismo</h5>
                </div>
                <div class="carousel-subtitulo" align="right">
                  <h6 class="fw-normal">Equipamentos para seu treino render ainda +</h6>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <a name="camisas-time"></a>
        <h4 class="fw-lighter mt-4 mb-3">Camisas de Time</h4>
        <div class="row mb-5">
          <?php
            $sql = "SELECT * FROM produtos WHERE categoria = '1'";
            $resultado = mysqli_query($conexao,$sql);

            if (mysqli_num_rows($resultado) > 0) 
            {
              while ($dados = mysqli_fetch_array($resultado)) 
              {
          ?>
          <div class="col-sm-3">
            <?php
              $id = $dados['id'];
            ?>
            <?php echo "<a href='verproduto.php?id=$id'> "; ?><img src="<?= $dados['imagem'] ?>" width="100%" class="produto-imagem mb-2"></a>
            <h6 class="fw-light"><?= $dados['descricao'] ?></h6>
            <div class="background-15 py-1 px-3 border-top">
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
              <h6>R$ <?= number_format($valor, 2, ",", ".") ?></h6>
              <h6 class="fw-light"><?= $dados['max_parcelas'] ?>x de R$ <?= number_format($valor_parcela, 2, ",", ".") ?></h6>
            </div>
          </div>
          <?php
              }
            }
          ?>
        </div>
        <div class="row background-10 py-4 px-3">
          <a name="jordan"></a>
          <h4 class="fw-lighter mb-3">Jordan</h4>
          <?php
            $sql = "SELECT * FROM produtos WHERE categoria = '2'";
            $resultado = mysqli_query($conexao,$sql);

            if (mysqli_num_rows($resultado) > 0) 
            {
              while ($dados = mysqli_fetch_array($resultado)) 
              {
          ?>
          <div class="col-sm-3">
            <?php
              $id = $dados['id'];
            ?>
            <?php echo "<a href='verproduto.php?id=$id'> "; ?><img src="<?= $dados['imagem'] ?>" width="100%" class="produto-imagem mb-2"></a>
            <h6 class="fw-light"><?= $dados['descricao'] ?>ㅤㅤㅤ</h6>
            <div class="background-15 py-1 px-3 border-top">
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
              <h6>R$ <?= number_format($valor, 2, ",", ".") ?></h6>
              <h6 class="fw-light"><?= $dados['max_parcelas'] ?>x de R$ <?= number_format($valor_parcela, 2, ",", ".") ?></h6>
            </div>
          </div>
          <?php
              }
            }
          ?>
        </div>
        <a name="atletismo"></a>
        <h4 class="fw-lighter mt-4 mb-3">Atletismo</h4>
        <div class="row mb-5">
          <?php
              $sql = "SELECT * FROM produtos WHERE categoria = '3'";
              $resultado = mysqli_query($conexao,$sql);

              if (mysqli_num_rows($resultado) > 0) 
              {
                while ($dados = mysqli_fetch_array($resultado)) 
                {
            ?>
          <div class="col-sm-3">
              <?php
                $id = $dados['id'];
              ?>
              <?php echo "<a href='verproduto.php?id=$id'> "; ?><img src="<?= $dados['imagem'] ?>" width="100%" class="produto-imagem mb-2"></a>
              <h6 class="fw-light"><?= $dados['descricao'] ?>ㅤㅤㅤ</h6>
              <div class="background-15 py-1 px-3 border-top">
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
                <h6>R$ <?= number_format($valor, 2, ",", ".") ?></h6>
                <h6 class="fw-light"><?= $dados['max_parcelas'] ?>x de R$ <?= number_format($valor_parcela, 2, ",", ".") ?></h6>
              </div>
            </div>
            <?php
                }
              }
            ?>
        </div>
        <div class="row background-10 py-4 px-3">
          <a name="snkrs"></a>
          <h4 class="fw-lighter mb-3">SNKRS</h4>
          <?php
            $sql = "SELECT * FROM produtos WHERE categoria = '4'";
            $resultado = mysqli_query($conexao,$sql);

            if (mysqli_num_rows($resultado) > 0) 
            {
              while ($dados = mysqli_fetch_array($resultado)) 
              {
          ?>
          <div class="col-sm-3">
            <?php
              $id = $dados['id'];
            ?>
            <?php echo "<a href='verproduto.php?id=$id'> "; ?><img src="<?= $dados['imagem'] ?>" width="100%" class="produto-imagem mb-2"></a>
            <h6 class="fw-light"><?= $dados['descricao'] ?>ㅤㅤㅤ</h6>
            <div class="background-15 py-1 px-3 border-top">
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
              <h6>R$ <?= number_format($valor, 2, ",", ".") ?></h6>
              <h6 class="fw-light"><?= $dados['max_parcelas'] ?>x de R$ <?= number_format($valor_parcela, 2, ",", ".") ?></h6>
            </div>
          </div>
          <?php
              }
            }
          ?>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <div class="container background-15 mt-5">
      <div class="row py-5 px-5">
        <div class="col-sm-4">
          <div class="row">
            <div class="col">
              <a href="#topo"><h6 class="fw-light">Voltar ao topo</h6></a>
              <h6 class="fw-light opacity-50">Categoriasㅤㅤㅤ></h6>
            </div>
            <div class="col">
              <h6 class="fw-light">ㅤ</h6>
              <a href="#camisas-time"><h6 class="fw-light">Camisas de Time</h6></a>
              <a href="#jordan"><h6 class="fw-light">Jordan</h6></a>
              <a href="#atletismo"><h6 class="fw-light">Atletismo</h6></a>
              <a href="#snkrs"><h6 class="fw-light">SNKRS</h6></a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 text-center">
          <img src="img/logo-nike.png" alt="Logotipo da Nike" width="25%">
          <h6 class="fw-light">Nike</h6>
        </div>
        <div class="col-sm-4"> 
        </div>
      </div>
    </div>
  </footer>
</body>
</html>