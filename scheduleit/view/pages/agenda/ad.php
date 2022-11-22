<?php
$sth = $con->prepare("SELECT * FROM horario WHERE idFuncionario=".$_GET['id']." AND dataDMA='".$_GET['dataDMA']."' ORDER BY idHorario;");
$sth->setFetchMode(PDO:: FETCH_OBJ);
$sth->execute();

$arr = array();
while($row=$sth->fetch()) {
    array_push($arr, array($row->idHorario, $row->disabilitado));
}

$perm = false;
if (isset($_SESSION["id"])) {
    try {
        $con = conectarBDPDO();
        $sth = $con->prepare("SELECT * FROM usuario WHERE id=".$_SESSION["id"].";");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        $row=$sth->fetch();
        $permissao = $row->permissao;
    } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
    $permissao = $row->permissao;
    if ($_SESSION["id"] == $idProprietario || $permissao == 9) {
        $perm = true;
    }
} else {
    header("Location: ../view/pages/login/login.php");
}

$h=7;
for ($i=1; $i<=9; $i++) {
    if (!empty($arr) && in_array(array($i, 'true'), $arr)) {
    echo "<tr class='table-secondary'>
                <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
                <td class='tdw align-middle'></td>
                <td class='align-middle text-end'><button class='btn btn-sm btn-outline-secondary' disabled>Disabilitado</button></td>";
            if ($perm) {
                echo "<td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary me-2' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,2)'><i class='bi bi-calendar-x'></i></button></td>";
            }
            echo "</tr>";
    } else if (!empty($arr) && in_array(array($i, 'false'), $arr)) {
    echo "<tr class='table-danger'>
            <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
            <td class='tdw text-truncate align-middle'>Nome</td>";
            if ($perm) {
                echo "<td class='align-middle text-end'><button class='btn btn-sm btn-outline-danger' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,2)'>Reservado</button></td>
                    <td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary me-2' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,4)'><i class='bi bi-calendar-x'></i></button></td>";
            } else {
                echo "<td class='align-middle text-end'><button class='btn btn-sm btn-outline-danger' disabled>Reservado</button></td>
                    </tr>";
            }
    } else {
    echo "<tr>
            <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
            <td class='tdw text-truncate align-middle'></td>
            <td class='align-middle text-end'><button class='btn btn-sm btn-outline-success' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,1)'>Agendar</button></td>";
            if ($perm) {
            echo "<td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary me-2' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,3)'><i class='bi bi-calendar-x'></i></button></td>";
            }
            echo "</tr>";
    }
    if ($i==4) {
    $h+=3;
    } else {
    $h++;
    }
}
?>