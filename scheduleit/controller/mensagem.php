<?php
    function echoDiv($alert, $get) {
        echo "<div class='text-center border rounded bg-white p-0 mb-2 rounded'>
                        <div style='margin-bottom:0 !important' class='alert alert-".$alert."' role='alert'>
                            $get
                        </div>
                        </div>";
    }

    function mensagem($mensagem) {
        // Exibir a mensagem de ERRO caso OCORRA
        if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
            $get = $_GET["msg"];
            $type = $_GET["msgType"];
            if ($get=="0") {
                echoDiv('success', $mensagem);
            } else {
                if ($type==1) {
                    echoDiv('success', $get);
                }
                else if ($type==2) {
                    echoDiv('warning', $get);
                } else {
                    echoDiv('danger', $get);
                }
            }
        }
    }
?>