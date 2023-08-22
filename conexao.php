<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "empresa";

    if ( $conn = mysqli_connect ($server, $user, $pass, $bd) ) {
        // echo"Conectado!";
    } else {
        echo"Erro!";
    }

    function mensagem($texto, $tipo) {
        echo "<div class='alert alert-$tipo' role='alert'>
                $texto
            </div>";
    }

    function mostra_data($data) {
        $d = explode('-', $data);
        $escreve = $d[2] ."/" .$d[1] ."/" .$d[0];
        return $escreve; 
    }

    function mover_foto($vetor_foto){
        if(!$vetor_foto['error']){
            $nome_arquivo = date('ymdhms') .".jpg";
            move_uploaded_file($vetor_foto['tmp_name'],"img/".$nome_arquivo);
            return $nome_arquivo;
        } else {
            return 0;
        }
    }

?>