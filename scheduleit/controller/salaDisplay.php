<?php
    function salaDisplay($idSala, $img, $nomeFantasia, $cidade, $estado, $classificacao, $visibilidade) {
        return  "<div class='salaDisplay border rounded bg-white me-3 mb-3 p-0'>
                    <div class='m-0 p-2 d-flex align-items-center gallery_product' onclick='redirectSala($idSala)'>
                        <div class='d-inline'>
                            <img class='rounded imgsala me-2' style='padding: 0!important; width: 7rem; height: 7rem;'  src='data:imgLogo/jpeg;base64,$img'>
                        </div>
                        <div class='d-inline lh-1'>
                            <span style='max-width: 220px;' class='d-inline-block text-truncate mb-1 fw-bold title-card'>$nomeFantasia</span>
                            <p class='m-0'><small>$cidade - $estado</small></p>
                            <p class='mt-3 stars'><i class='bi bi-star-fill'></i> $classificacao</p>
                        </div>
                    </div>
                </div>";
    }
?>