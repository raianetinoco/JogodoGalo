<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Linkando o  css com html-->
        <link rel="stylesheet" type="text/css" href="./styles/style.css">
        <title>
            Jogo do Galo
        </title>
    </head>

    <body>
        <!--Pagina Inicial-->
        <div class="show Name"  id="showName">
            <div class="block-one">
                <h1>
                    Jogo do Galo
                </h1> 

                <div class="box-dados">
                    <div class="dados">  
                        <!--ligação com o php-->                 
                        <form action="./game.php" enctype="multipart/form-data" method="POST">
                            <div class="input-block">
                                <label class="name-jogador" for="jogador1">
                                    Nome do jogador X
                                 </label>
                                <br> 
                                <!--campo para preencher  o nome do jogador 1-->                                  
                                <input class = "insert-jogador" type="text" name="jogador1" id="jogador1" placeholder="Jogador X" required>
                                <br>                               
                            </div> 

                            <br><br>

                            <div class="input-block">
                                <label class="name-jogador" for="jogador2">
                                    Nome do jogador O
                                </label>
                                <br>
                                <!--campo para preencher  o nome do jogador 1-->   
                                <input class = "insert-jogador" type="text" name="jogador2" id="jogador2" placeholder="Jogador O" required>
                                    
                                <br><br>

                                <!-- muda de página quando carregas no botão-->
                                <button class="bt-jogador" type="submit">
                                        Iniciar o Jogo 
                                </button>     
                            </div>
                        </form>                       
                    </div>  
                </div>     
            </div>
        </div>  

        <!--Linkando o  JS com html-->
        <script src="./scripts/game.js"></script>
        <script src="./scripts/interface.js"></script>
    </body>
</html>