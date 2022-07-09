<?php 

/* ligação da base dados com o PHP */

	$host = "localhost"; 
	$username = "root"; 
	$password =""; 
	$nomebd = "bd_jogogalo";

	$conexao = mysqli_connect($host,$username,$password,$nomebd);
	$conexao -> set_charset("utf8mb4");	
	if($conexao){
		echo " conexao bem sucedida";
	}else{
		echo "erro nos dados";
	}
?>