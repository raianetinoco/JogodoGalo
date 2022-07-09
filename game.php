<?php 
include("bd.php");
session_start(); // Inicia sessão para armazenamento de dados.

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Linkando o  css com html-->
        <link rel="stylesheet" type="text/css" href="./styles/style.css">
        <title>Jogo do Galo </title>
    </head>
    <body>
        <?php
            //pega o nome do jogador em html e  armazena em uma variavel de sessão em php
            $jogador1 = $_POST['jogador1'];
            $jogador2 = $_POST['jogador2'];

                if ($jogador1 != "" && $jogador2 != ""){ // verifica se tem algo para colocar nas variaveis de sessão 
                    $_SESSION['j1'] = $jogador1; // $_SESSION['*'] variavel de sessão 
                    $_SESSION['j2'] = $jogador2;// armazena nas variaveis de sessao
                }
       ?>
        <!--pagina do Tabuleiro -->
        <div class="show Game"  id="showGame">
            <div class="block-two">
                <!-- Divisões do Tabuleiro -->
                <div class ="top">
                    <!-- pecas do tabuleiro -->
                    <div id= "0" class="square"> </div>  
                    <div id= "1" class="square"> </div>
                    <div id= "2" class="square"> </div>
                </div>
                <div>
                    <div id= "3" class="square"> </div>
                    <div id= "4" class="square"> </div>
                    <div id= "5" class="square"> </div>
                </div>
                <div>
                    <div id= "6" class="square"> </div>
                    <div id= "7" class="square"> </div>
                    <div id= "8" class="square"> </div>
                </div>
                <!--para aparecer o nome dos jogadores abaixo do tabuleiro-->   
                <div class="x id">
                    <!--aparece os nomes dos jogadores com os icones abaixo do tabuleiro-->
                    <?php echo $_SESSION['j1']. " :"; ?>  
                </div>
                <br> 
                <div class="o id">   
                    <?php echo $_SESSION['j2']. " :"; ?> 
                </div>
            </div> 
        </div>
        <!-- tela final do jogo que mostra o vencedor -->
        <div class="winning-message" id="data-winning-message">
            <p class="winning-message-text" id="data-winning-message-text"> </p>
            
            <!-- melhorias:
               - Clicar no botão de reinicar e mesmo assim gravar o jogo
               - clicar no botão ranking e mesmo assim gravar o jogo
               - clicar em gravar ranking e manter a tela final para clicar em ver o rankig ou reinicar o jogo

            -->  
            <!-- Reinicia o jogo-->
            <button class="winning-message-button" data-winning-message-button onclick="reiniciar()">
                Reiniciar
            </button>

            <!-- vê o ranking do jogo, mas precisa clicar em gravar ranking para salvar se não perde a ultima partida-->
            <button class="winning-message-button-rank" onclick="showRank()">
                Ver Ranking
            </button>
            <!-- Botão para gravar o jogo e salvar no ranking-->
            <form action="guardar.php" method="POST">
                <input type="text" name="jogador1" id="pont1">
                <input type="text" name="jogador2" id="pont2">
                <input type="submit" class="winning-message-button-rank" value="Gravar Ranking">
            </form>
            
        </div>
        
        <!--Página do Ranking -->
        <div class="show Rank" id="showRank">
            <div class="block-three">
                <h2> Ranking dos Jogadores </h2>
                        <?php 
                        //pega da base de dados as informacoes do jogador em mostra na pagina do ranking
                            $selectRank="SELECT * FROM jogador;";
                            $resRank = $conexao -> query($selectRank);
                         ?>
                        <h3>
                        <table>
                            
                                <tr>
                                    <th><h3>Nome do Jogador</h3></th>
                                    <th><h3>Classificação</h3></th>
                                </tr>
                                <?php 
                                //preenche a tabela de ranking com o nome do jogador e a classificação dele
                                    while($row = $resRank->fetch_assoc()) { 
                                        echo "<tr>";
                                            echo '<td> <h3>'.$row['nome_jogador'].'</h3></td>';
                                            echo '<td> <h3>'.$row['ranking'].'</h3></td>';
                                        echo "</tr>";
                                }?>
                                    
                        </table>
                    </h3>
                     <!-- volta na pagina inicial do jogo para add novos jogadores-->           
                    <button class="bt-recomecar" onclick="window.location.replace('index.php')">
                        Recomeçar
                    </button>                          
            </div>
        </div>      
       
        <?php
        //coloca as informacoes de pontuacao na tabela
            function saveQuery(){
                $pontuacao1 = "<script>document.write(pont1)</script>";
                $pontuacao2 = "<script>document.write(pont2)</script>";
                echo $pontuacao1;
                echo $pontuacao2; 
            }   
            ?>

        <!--Linkando o  JS com html-->
        <script src="./scripts/game.js"></script>
        <script src="./scripts/interface.js"></script>
    </body>
</html>



