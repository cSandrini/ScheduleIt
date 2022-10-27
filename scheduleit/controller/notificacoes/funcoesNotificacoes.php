<?php
    function carregarImagemPerfil() {
        if(isset($_SESSION['imagem'])) {
            $imagemPerf=$_SESSION['imagem'];
            echo "<img class='me-3 rounded' src='data:image/jpeg;base64,".base64_encode($imagemPerf)."' alt='' width='48' height='48'>";
        } else {
            echo "<img class='me-3 rounded' src='../../styles/blank.png' alt='' width='48' height='48'>";
        }
    }
?>