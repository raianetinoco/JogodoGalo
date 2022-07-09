//carregamento do html
document.addEventListener('DOMContentLoaded', ()=>{
    let squares = document.querySelectorAll(".square");

    //permite clicar nos quadrados que irão sofrer a ação
    squares.forEach((square) =>{
         square.addEventListener('click', handleClick);    
    })
})

//mostra qual elemento que foi clicado
function handleClick(event){
    console.log(event.target); //quadrados que sofreram a ação do click

    let square = event.target; //qual elemento foi clicado
    let position = square.id; //posição que será feita o movimento de click

    if (handleMove(position)){
       //criar a sequencia vencedora
        var telafinal = document.getElementById("data-winning-message"); //mostra a tela que o jogo acabou
        telafinal.style.display="flex";
    };
    updateSquares();
}     

//atualiza os quadrados um a um com os simbolos do html
function updateSquares(){
    let squares = document.querySelectorAll(".square");

    squares.forEach((square) =>{
        let position = square.id;
        let symbol = board [position];

        if(symbol != ''){
            square.innerHTML = `<div class='${symbol}'></div>`;
        }
    });    
}

//limpa os quadrados do jogo
function updateSq(a){
    let squares = document.querySelectorAll(".square");

    squares.forEach((square) =>{
        let position = square.id;
       
        if(a == true){
            square.innerHTML = ``;
        }
    });    
}

// mostra o ranking e oculta a tela do game e a tela final
function showRank(){
    var showGame = document.getElementById("showGame");
    var showRank = document.getElementById("showRank");
    showGame.style.display="none";
    showRank.style.display="block";
    var telafinal = document.getElementById("data-winning-message");
    telafinal.style.display="none";
}
