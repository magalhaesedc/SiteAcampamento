<?php 

$btnAjuda = filter_input(INPUT_POST, 'bt-ajuda', FILTER_SANITIZE_STRING);

if($btnLogin){
	$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
	
	

}else{
	header("Location: index.html");
}


?>