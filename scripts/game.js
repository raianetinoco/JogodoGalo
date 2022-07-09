//criação do tabuleiro | array vazio que será preencido com "o" ou "x"
let board = ['','','','','','','','','']; 

//criação vez do jogador
let playerTime = 0;

let gameOver = false; //diz que o jogo não acabou

// criação dos simbolos
let symbols = ['x', 'o'];

//criação dos acumulos de pontos para cada jogador
var pont1 = 0;
var pont2 = 0;

//criação de arrays das posições que são possiveis ganhar
let winStates = [
    //horizontal sequencia 0 (vertical ex 0,1,2)
     [0,1,2],
     [3,4,5],
     [6,7,8],

    //vertical sequencia 1 (vertical ex 0,3,6)
     [0,3,6],
     [1,4,7],
     [2,5,8],

    //diagonal sequencia 2 (vertical ex 0,4,8)
     [0,4,8],
     [2,4,6],
 ]

//criando variaveis que chamam o html no JS  
 const winningMessageTextElement = document.querySelector("[data-winning-message-text]"); // mensagem de texto do vencedor
 const winningMessage = document.querySelector("[data-winning-message]"); //div da mensagem
 //const restartButton = document.querySelector("[data-restart-button]"); apagar


//colocar os simbolos dentro da posição
function handleMove(position){ //position = posição que quer realizar o evento "move"

    //para acabar o jogo se tiver um vencedor
    if(gameOver == true){
        return;
    }

    //para nao substituir o objeto
    if(board[position] == ''){
      board[position] = symbols[playerTime];

        //o jogo termina se teve um vencedor ou o quadro estiver cheio
        if(isWin() || fullBoard(board)){
            gameOver = true;
            endGame(); // permite mostra a msg na tela e finalizar o jogo
        }

        //permição da vez do jogador | 
        if(gameOver == false){
            playerTime = (playerTime == 0) ? 1 : 0; //realiza a troca do jogador
            //ou    
            /*    if(playerTime == 0){
                    playerTime = 1;
                }else{
                    playerTime = 0;
                }
                */
            }
    }
    return gameOver;
}    


//para terminar o jogo se tiver um vencedor  
function isWin(){
//estados da vitória        
       
        for (i = 0; i< winStates.length; i++){
            let seq = winStates[i];

            let pos1 = seq[0];
            let pos2 = seq[1];
            let pos3 = seq[2];

            //se o elemento da pos1, pos2 e pos3 foram iguais e pos1 for != de vazio terá um vencedor
            if (board [pos1] == board[pos2] && 
                board[pos1] == board[pos3] && 
                board[pos1] != ''){ //o board da pos1 precisa ser diferente de vazio
                
                return true;   //tem um vencedor
            }
        }  

    return false; //não teve um vencedor
}
//verifica se as posições do arrays estão cheias
function fullBoard(board){
    for (i = 0; i < board.length; i ++){
        if (board[i] == ''){
            return false; //retorna falso se o array estiver vazio até enche-lo
        }
    }
    return true; 
}

//fim de jogo 
const endGame = () =>{
    if (!isWin()){
        document.querySelector("#data-winning-message-text").innerHTML = "Empate!!!";
    }else{
        if (playerTime == 0){
            pont1++; //somar os pontos do jogador 1
            document.getElementById("pont1").setAttribute('value',pont1);
		
            document.querySelector("#data-winning-message-text").innerHTML = "Jogador X venceu, tem " + pont1 + " ponto(s).";
        }else if (playerTime == 1){
            pont2++; //somar os pontos do jogador 2
            document.getElementById("pont2").setAttribute('value',pont2);
            document.querySelector("#data-winning-message-text").innerHTML = "Jogador O venceu, tem " + pont2 + " ponto(s).";
        }else{
            document.querySelector("#data-winning-message-text").innerHTML = "Erro";
        }
    }
}

//reinicia a partida do jogo
function reiniciar(){
    var a1 = document.getElementById("0");
    var a2 = document.getElementById("1");
    var a3 = document.getElementById("2");

    var b1 = document.getElementById("3");
    var b2 = document.getElementById("4");
    var b3 = document.getElementById("5");

    var c1 = document.getElementById("6");
    var c2 = document.getElementById("7");
    var c3 = document.getElementById("8");

    var janelawin = document.getElementById("data-winning-message");

    a1. innerHTML = "";
    a2. innerHTML = "";
    a3. innerHTML = "";
    b1. innerHTML = "";
    b2. innerHTML = "";
    b3. innerHTML = "";
    c1. innerHTML = "";
    c2. innerHTML = "";
    c3. innerHTML = "";

    janelawin.style.display="none";

    gameOver= false;
    playerTime = 0;
    for (i = 0; i < board.length; i ++){
        board[i] = '';
     }
     var limp = true;
     updateSq(limp)

}