<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once "../../../controller/sala/funcoesSala.php";
    require_once "../../../controller/funcionario/funcoesFuncionario.php";
    require_once "../../../controller/mensagem.php";

?>

<html lang="pt-BR"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sala de agendamento</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="../../styles/css/cover.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js.js"></script>

</head>

<body class="bg-light">
  <?php
    require_once '../parts/header.php';
    echo "<div>";
    echo "<div class='container p-0'>";
    mensagem('Editado com sucesso.');
    echo "</div>";
  ?>
<div class="container border rounded bg-white p-0 sala">    
  <div>
    <div>
      <div  class="d-flex align-items-center p-3 text-white-50 bg-info rounded">
        <?php
          interfaceEditarSala($img, $idProprietario, $idSala);
        ?>
      </div>  
      <div class="card-body p-0 pt-3">
        <h4 class="card-title text-center"><?php echo $nomeFantasia ?></h4> 
        <hr>
        <div class="px-4 conteudosSala">
          <div class="descricao rounded bg-light">
            <p class="card-text"> <?php echo $descricao ?> <br><br> <?php echo "CEP: $cep. $cidade - $estado. $rua, $bairro, $numero, $complemento."?> <br><br> Horário de atendimento <br><br> <?php echo "Email: $email" ?> <br> <?php echo "Telefone: $telefone" ?> </p> 
          </div>
          <?php 
            if (isset($_SESSION['id'])) {
              $session = $_SESSION['id'];
            }
            echo "<div class='bg-light rounded funcionarios'>";
              echo "<div class='text-center'><p class='text-card'>Funcionários</p></div>";
              echo "<div class='overflow-auto' style='height: 330px;'>";
                carregarFuncionarios($idSala);
              echo "</div>";
            echo "</div>";
          ?>
          
          <div>
            <?php
              editarFuncionario($idProprietario, $idSala);
            ?>
          </div>
        </div>  
      </div>
      <hr class="my-4">
    </div>
  </div>
</div>
</div>
<?php require_once "../parts/footer.php"; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
  crossorigin="anonymous"></script>
</html>