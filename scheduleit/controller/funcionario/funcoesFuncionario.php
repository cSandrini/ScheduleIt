<?php
function carregarFuncionarios($idSala){
    require_once '../../../controller/funcionarioDisplay.php';

    try {
        $con = conectarBDPDO();
        $sth = $con->prepare("SELECT * FROM funcionario, usuario WHERE idSala=".$_GET["idSala"]." AND funcionario.idUsuario = usuario.id;");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        if ($sth->rowCount() > 0) {
            $i=1;
            while($row=$sth->fetch()) {
              if(!isset($row->foto)) {
                $foto = addslashes('../../styles/blank.png');
                $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='$foto'>";
              } else {
                $foto = base64_encode($row->foto);
                $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='data:image/png;base64,$foto'>";
              }
              $i++;
            if (isset($_SESSION['id']) && $_SESSION['id']==$_GET['idSala'] || $_SESSION['id']==1) {
                $removerFuncionarioButton = "<a href='../../../controller/funcionario/removerFuncionario.php?idSala=$row->idSala&idUsuario=$row->idUsuario'><button class='m-0 p-0 btn btn-link text-decoration-none cornerButton text-danger' onclick='removerFuncionario(this)'><i class='bi bi-x-circle-fill'></i></button></a>";
            } else {
                $removerFuncionarioButton = "";
            }
              echo  "<div class='funcionarioDisplay border rounded bg-white me-3 mb-3 p-0'>
                      <div class='m-0 p-2 d-flex align-items-center gallery_product' onclick='redirectAgenda($row->idUsuario)'>
                          <div class='d-inline'>"
                            ,$imgTag,
                          "</div>
                          <div class='d-inline lh-1'>
                              <span style='max-width: 110px;' class='d-inline-block text-truncate mb-1 title-card'>$row->nome</span>
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
    }

?>