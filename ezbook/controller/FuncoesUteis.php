<?php

    function validarDados($nome, $sobrenome, $cpf, $numero, $email, $senha, $senha2) {
    
        $msgErro = "";

        if (empty($nome)) {
            $msgErro = $msgErro . "NOME inválido! <BR>";
        }

        if ( empty($sobrenome) ) {
            $msgErro = $msgErro . "SOBRENOME inválido! <BR>";
        }

        if ( empty($cpf) ) {
            $msgErro = $msgErro . "CPF inválido! <BR>";
        }

        if ( empty($numero) ) {
            $msgErro = $msgErro . "NÚMERO inválido! <BR>";
        }

        if ( empty($email) ) {
            $msgErro = $msgErro . "EMAIL inválido! <BR>";
        }

        if ( empty($senha) ) {
            $msgErro = $msgErro . "SENHA inválido! <BR>";
        } elseif ( empty($senha2) || $senha!=$senha2) {
            $msgErro = $msgErro . "SENHA2 inválida! <BR>";
        }

        return $msgErro;
    }
    
    function validarData($dt) {
        $dataSep = explode("/", $dt);
        if ( count($dataSep) != 3 ) {
            return false;
        } else {
            $dia = $dataSep[0];
            $mes = $dataSep[1];
            $ano = $dataSep[2];
            return checkdate($mes, $dia, $ano);
        }
    }

    function converterDataParaBanco ( $data) {
        if ( validarData($data) ) {
            $dtSep = explode("/", $data);
            $dia = $dtSep[0];
            $mes = $dtSep[1];
            $ano = $dtSep[2];
            return "$ano-$mes-$dia";
        } else {
            return null;
        }
    }

?>

