<?php
function carregarFuncionarios($idSala){
    require_once  __DIR__ . '/../../controller/funcionarioDisplay.php';
    if(isset($_SESSION["id"])) {
      try {
        $con = conectarBDPDO();
        $sth = $con->prepare("SELECT * FROM usuario, sala WHERE idSala=".$idSala." AND id=".$_SESSION['id'].";");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        $row=$sth->fetch();
        if ($sth->rowCount() > 0) {
          $permissao = $row->permissao;
          $idProprietario = $row->idProprietario;
        }
      } catch(PDOException $e) {
          echo "Error: ". $e->getMessage();
      }
    }
    if (isset($_SESSION['id']) && isset($idProprietario) && $_SESSION['id']==$idProprietario || isset($permissao) && $permissao==9) {
      try {
        $imgTag = "<div class='bg-loading rounded imgsala me-2 text-center' style='padding: 0!important; width: 80px; height: 80px;'>
                        <div class='spinner-border loadingFuncionario' role='status'>
                          <span class='sr-only'>Loading...</span>
                        </div>
                      </div>";
        $con = conectarBDPDO();
        $sth = $con->prepare("SELECT * FROM notificacao, usuario WHERE idSala='$idSala' AND tipo='2' AND notificacao.idUsuario = usuario.id;");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        if ($sth->rowCount() > 0) {
          while($row=$sth->fetch()) {
            echo  "<div class='funcionarioDisplay border rounded bg-white mb-2 p-0 mx-auto'>
                          <div class='m-0 p-2 d-flex align-items-center gallery_product' onclick='redirectAgenda($row->idUsuario)'>
                            <div class='d-inline'>"
                              ,$imgTag,
                            "</div>
                            <div class='d-inline lh-1'>
                                <span style='max-width: 110px;' class='d-inline-block text-truncate mb-1 title-card'>$row->nome</span>
                                <span class='pendente text-muted'>Pendente...</span>
                            </div>
                          </div><a href='/ignorar/$row->idUsuario/$row->idSala?idSala=$idSala'><button class='m-0 p-0 btn btn-link text-decoration-none cornerButton text-danger'><i class='bi bi-x-circle-fill'></i></button></a>
                        </div>";
          }
        }
      } catch(PDOException $e) {
          echo "Error: ". $e->getMessage();
      }
    } 
    try {
        $con = conectarBDPDO();
        $sth = $con->prepare("SELECT * FROM funcionario, usuario WHERE idSala=".$idSala." AND funcionario.idUsuario = usuario.id;");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        if ($sth->rowCount() > 0) {
            while($row=$sth->fetch()) {
              if(!isset($row->foto)) {
                $foto = addslashes('../scheduleit/view/styles/blank.png');
                $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='$foto'>";
              } else {
                $foto = base64_encode($row->foto);
                $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='data:image/png;base64,$foto'>";
              }
            if (isset($_SESSION['id']) && isset($idProprietario) && $_SESSION['id']==$idProprietario || isset($permissao) && $permissao==9) {
              $removerFuncionarioButton = "<a href='/removerFuncionario/$row->idSala/$row->idUsuario'><button class='m-0 p-0 btn btn-link text-decoration-none cornerButton text-danger'><i class='bi bi-x-circle-fill'></i></button></a>";
            } else {
              $removerFuncionarioButton = "";
            }
              echo  "<div class='funcionarioDisplay border rounded bg-white mb-2 p-0 mx-auto'>
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
            echo  "<div>
                    <div class='alert alert-warning text-center notificacaoFuncionario' role='alert'>
                        Nenhum funcionário encontrado.
                    </div>
                  </div>";
        }
      } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
      }
    }

?>