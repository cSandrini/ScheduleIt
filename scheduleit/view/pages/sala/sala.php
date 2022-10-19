<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once "../../../controller/sala/funcoesSala.php";
    require_once "../../../controller/mensagem.php";
?>

<html lang="pt-BR"><head>
  <meta charset="UTF-8">
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
  echo "<div class='mx-auto col-md-3'>";
  mensagem('Editado com sucesso.');
  echo "</div>";
?>
  </div>     
  <div class="container border rounded bg-white p-0 mt-3 rounded">    
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
        </div>

            <!--
            <div>
              <div class="pt-5">
                <fieldset class="rating">
                  <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                  <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                  <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                  <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                  <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                </fieldset>
              </div>
            </div>
            -->
          </div>
          
        </div>
      </div>
      <hr class="my-4">
    </div>
  </div>
</div>
    
  

    <?php require_once "../parts/footer.php"; ?>
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
    crossorigin="anonymous"></script>

</html>