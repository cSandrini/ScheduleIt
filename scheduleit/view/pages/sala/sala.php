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
          <div>
          <button for="botaofunc" class="btn btn-outline-secondary">
          
              

                  <?php
                //Conexao no método PDO (?)
                try {
                    $con = new PDO("mysql:host=localhost;dbname=scheduleit",'root','');

                    $sth = $con->prepare("SELECT * FROM usuario WHERE cpf = 13560366781;");
                    $sth->setFetchMode(PDO:: FETCH_OBJ);
                    $sth->execute();

                    
                    if ($sth->rowCount() > 0) {
                        $i=1;
                        while($row=$sth->fetch()) {
                          $foto = base64_encode($row->foto);
                                ?>
                                    <?php$i++?>
                                    <div style="float: left;">
                                    <?php
                                    if($foto) {
            echo "<img id='imgShow' class='me-3 border rounded' src='data:image/jpeg;base64,$foto' alt='' width='80' height='80'>";
        } else {
            echo "<img id='imgShow' class='me-3 border rounded' src='../../styles/blank.png' alt='' width='120' height='120'>";
        }
        ?>
                  </div>
                                    <div style="float: right;"> 
                                     <h4 class="fw-bold mb-0">  
                                     <?php echo $row->nome; ?>
                                     </h4> 
                                      <p> 
                                      Função do funcionário  
                                      </p>  
                                      </div>
                                <?php
                        }
                    } else {
                        echo "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                            Nenhum resultado encontrado.
                        </div>";
                    }
                } catch(PDOException $e) {
                    echo "Error: ". $e->getMessage();
                }
//**  */

            ?>
    
          
          
        </button>
          </div>
          <div style="float: left">
            <?php
              editarFuncionario($idProprietario);
            ?>
            </div>
        </div>
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