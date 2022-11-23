<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once "../../../controller/sala/funcoesSala.php";
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
<div class="container border rounded bg-white p-0 rounded">    
  <div>
    <div>
      <div  class="d-flex align-items-center p-3 text-white-50 bg-info rounded">
        <?php
          editarSala($img, $idProprietario, $idSala);
        ?>
      </div>  
      <div class="card-body p-0 pt-3">
        <h4 class="card-title text-center"><?php echo $nomeFantasia ?></h4> 
        <hr>
        <div class="px-4 d-flex justify-content-between">
          <div class="col-3 border rounded p-2 me-2 bg-light">
            <p class="card-text"> <?php echo $descricao ?> <br><br> <?php echo "CEP: $cep. $cidade - $estado. $rua, $bairro, $numero, $complemento."?> <br><br> Horário de atendimento <br><br> <?php echo "Email: $email" ?> <br> <?php echo "Telefone: $telefone" ?> </p> 
          </div>
          <?php
            if (isset($_SESSION['id']) && $_SESSION['id']==$idProprietario) {
              $removerFuncionarioButton = "<button class='m-0 p-0 btn btn-link text-decoration-none cornerButton text-danger' onclick='removerFuncionario(this)'><i class='bi bi-x-circle-fill'></i></button>";
            } else {
              $removerFuncionarioButton = "";
            }
            //Conexao no método PDO (?)
            try {
              $con = new PDO("mysql:host=localhost;dbname=scheduleit",'root','');
              $sth = $con->prepare("SELECT * FROM usuario WHERE cpf = 13560366781;");
              $sth->setFetchMode(PDO:: FETCH_OBJ);
              $sth->execute();
              if ($sth->rowCount() > 0) {
                  $i=1;
                  while($row=$sth->fetch()) {
                    $foto = $row->foto;
                    if(!$foto) {
                      $foto = addslashes('../../styles/blank.png');
                      $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='$foto'>";
                    } else {
                      $foto = base64_encode($foto);
                      $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='data:image/png;base64,$foto'>";
                    }
                    $i++;
                    echo  "<div class='funcionarioDisplay border rounded bg-white me-3 mb-3 p-0'>
                            <div class='m-0 p-2 d-flex align-items-center gallery_product' onclick='redirectAgenda($row->id)'>
                                <div class='d-inline'>"
                                  ,$imgTag,
                                "</div>
                                <div class='d-inline lh-1'>
                                    <span style='max-width: 220px;' class='d-inline-block text-truncate mb-1 fw-bold title-card'>$row->nome</span>
                                </div>
                            </div>",$removerFuncionarioButton,
                          "</div>";
                  }
              } else {
                  echo  "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                            Nenhum resultado encontrado.
                        </div>";
              }
            } catch(PDOException $e) {
              echo "Error: ". $e->getMessage();
            }
          ?>
          <div style="float: left">
            <?php
              editarFuncionario($idProprietario);
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