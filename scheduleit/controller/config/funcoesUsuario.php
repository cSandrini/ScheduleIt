<?php //CARREGAR IMAGEM DE PERFIL
    function carregarDadosUsuario($id) {
        require_once __DIR__ . '/../../model/conexaobd.php';
        try {
            $con = conectarBDPDO();
            $sth = $con->prepare("SELECT * FROM usuario WHERE id=".$id.";");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();

            if ($sth->rowCount() > 0) {
                $i=1;
                while($row=$sth->fetch()) {
                    if (isset($row->foto)) {
                        $img = base64_encode($row->foto);
                    }
                }
            }
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
        }

        if(isset($img)) {
            echo "<img id='imgShow' class='me-3 border rounded' src='data:image/jpeg;base64,$img' alt='' width='120' height='120'>";
        } else {
            echo "<img id='imgShow' class='me-3 border rounded' src='scheduleit/view/styles/blank.png' alt='' width='120' height='120'>";
        }
    }
?>