<?php

include_once './conexao.php';

$email1_input = filter_input(INPUT_POST, 'email1', FILTER_SANITIZE_STRING);
$email2_input = filter_input(INPUT_POST, 'email2', FILTER_SANITIZE_STRING);

//echo '<script>alert("';
//echo $email1_input;
//echo '");</script>';
//echo '<script>alert("';
//echo $email2_input;
//echo '");</script>';

$sql = "SELECT * FROM acampantes WHERE email = :email1 OR email = :email2 LIMIT 1";

	$sql = $conexao->prepare($sql);
	$sql ->bindParam(':email1', $email1_input);
	$sql ->bindParam(':email2', $email2_input);

	$sql->execute();

	//echo ($sql->rowcount()) . " | ";

	if ($sql->rowcount() < 1) {
	    echo '<span id="resultado-email">livre</span>'; 
	}else{
		echo '<span id="resultado-email">usando</span>';	
	}
?>