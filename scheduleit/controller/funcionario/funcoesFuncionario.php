<?php
    require_once '../../../model/conexaobd.php';

function carregarFuncionarios($idSala, $idProprietario, $session){
    require_once '../../../controller/funcionarioDisplay.php';

    if ($session==$idProprietario) {
        $removerFuncionarioButton = "<button class='m-0 p-0 btn btn-link text-decoration-none cornerButton text-danger' onclick='removerFuncionario(this)'><i class='bi bi-x-circle-fill'></i></button>";
    } else {
        $removerFuncionarioButton = "";
    }
    try {
        $con = new PDO("mysql:host=localhost;dbname=scheduleit",'root','');
        $sth = $con->prepare('SELECT * FROM funcionario WHERE idSala = '.$idSala.';');
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        if ($sth->rowCount() > 0) {
            $i=1;
            while($row=$sth->fetch()) {
                $idUsuario = $row->idUsuario;
                $i++;
                $sth = $con->prepare('SELECT * FROM usuario WHERE id = '.$idUsuario.';');
                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth->execute();
                $funcionarioDisplay = funcionarioDisplay($row->id, $row->nome, $row->foto, $removerFuncionarioButton);
                echo $funcionarioDisplay;
            }
        } else {
            echo  "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                      Nenhum resultado encontrado.
                  </div>";
        }

      } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
      }
    }

?>