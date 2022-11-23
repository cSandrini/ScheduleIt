<?php
function funcionarioDisplay($id, $nome, $foto, $removerFuncionarioButton){
if(!$foto) {
    $foto = addslashes('../../styles/blank.png');
    $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='$foto'>";
} else {
    $foto = base64_encode($foto);
    $imgTag = "<img class='rounded imgsala me-2' style='padding: 0!important; width: 80px; height: 80px;'  src='data:image/png;base64,$foto'>";
}
    return "<div class='funcionarioDisplay border rounded bg-white me-3 mb-3 p-0'>
                <div class='m-0 p-2 d-flex align-items-center gallery_product' onclick='redirectAgenda($id)'>
                    <div class='d-inline'>
                    ,$imgTag,
                    </div>
                    <div class='d-inline lh-1'>
                        <span style='max-width: 220px;' class='d-inline-block text-truncate mb-1 fw-bold title-card'>
                        $nome
                        </span>
                    </div>
                </div>,$removerFuncionarioButton,
            </div>";
        }
?>