<?php
    require_once '../../model/conexaobd.php';
    function validarDados($nome, $sobrenome, $cpf, $telefone, $email, $senha, $senha2) {
    
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

        if ( empty($telefone) ) {
            $msgErro = $msgErro . "Telefone inválido! <BR>";
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

    function validarDadosSala($nome, $telefone, $email) {
    
        $msgErro = "";

        if (empty($nome)) {
            $msgErro = $msgErro . "NOME inválido! <BR>";
        }

        if ( empty($telefone) ) {
            $msgErro = $msgErro . "NÚMERO inválido! <BR>";
        }

        if ( empty($email) ) {
            $msgErro = $msgErro . "EMAIL inválido! <BR>";
        }

        return $msgErro;
    }
    
    function validarDadosAtt($id, $imagem, $senha, $senhaModal) {
        $msgErro = "";
        if($senha==$senhaModal) {
            require_once '../../model/perfilDAO.php';
            $conexao = conectarBD();
            $dados = carregarConfig($conexao, $id);
            if ($imagem["error"]!=0) {
                $msgErro = $msgErro . "Erro ao fazer upload da imagem! <BR>";
            } else if ($imagem["size"]>65000) {
                $msgErro = $msgErro . "Imagem maior que 65Kb! <BR>";
            } else if(($imagem["type"]!="image/gif") &&
                ($imagem["type"]!="image/jpeg") &&
                ($imagem["type"]!="image/pjpeg") &&
                ($imagem["type"]!="image/png") &&
                ($imagem["type"]!="image/x-png") &&
                ($imagem["type"]!="image/bmp")  ) {
            }
        } else {
            $msgErro = $msgErro . "Senha inválida! <BR>";
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

    function converterDataParaBanco ($data) {
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

    function converterNumerico ($string) {
        $output = preg_replace( '/[^0-9]/', '', $string );
        return $output;
    }
?>

