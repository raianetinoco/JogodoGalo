<?php
include("bd.php");
//esse ficheiro guardar a informaçao do raking

$newURL="game.php"; //link com o index  do jogo
session_start();
$jogadornome1 = $_SESSION['j1'];  // $_SESSION['*'] variavel de sessão 
$jogadornome2 = $_SESSION['j2'];
    $jogadorscore1 = $_POST['jogador1'];
    $jogadorscore2 = $_POST['jogador2'];

    $selectScore1="SELECT * FROM jogador where nome_jogador = '$jogadornome1'";
    $selectScore2="SELECT * FROM jogador where nome_jogador = '$jogadornome2'";

        $resultado1 = $conexao -> query($selectScore1);
        $resultado2 = $conexao -> query($selectScore2);

        if ($resultado1->num_rows > 0) {
            // output data of each row
            while($row = $resultado1->fetch_assoc()) {
              $update1 =    "UPDATE jogador SET ranking = ranking + '$jogadorscore1' where nome_jogador = '$jogadornome1'";
              $resutado= $conexao -> query($update1);
              if($resultado){
                header('Location: '.$newURL);
             }else{
                header('Location: '.$newURL); 
                }
            }
        }else{
            $insertJogador1= "INSERT INTO jogador (nome_jogador, ranking) VALUES ('$jogadornome1', $jogadorscore1)";
            $resultadoinsert1 = $conexao->query($insertJogador1);
            if($resultadoinsert1){
                header('Location: '.$newURL);
            }else{
                header('Location: '.$newURL);
            }
        }

        if ($resultado2->num_rows > 0) {
            // output data of each row
            while($row = $resultado2->fetch_assoc()) {
                $update2 =    "UPDATE jogador SET ranking = ranking + '$jogadorscore2' where nome_jogador = '$jogadornome2'";
                $resutados= $conexao -> query($update2);
                if($resultados){
                    header('Location: '.$newURL);
                  }else{
                    header('Location: '.$newURL);
                  }
            }
        }else{
            $insertJogador2= "INSERT INTO jogador (nome_jogador, ranking) VALUES ('$jogadornome2', $jogadorscore2)";
            $resultadoinsert2 = $conexao->query($insertJogador2);
            if($resultadoinsert2){
                header('Location: '.$newURL);
            }else{
                header('Location: '.$newURL);
            }
        }

?>