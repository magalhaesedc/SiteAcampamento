<?php
session_start();

unset($_SESSION['id'],
	$_SESSION['nome'],
	$_SESSION['email'],
	$_SESSION['msg_sucesso'],
	$_SESSION['msg_erro'],
	$_SESSION['referencia'],
	$_SESSION['status_inscricao'],
	$_SESSION['status_pagamento'],
	$_SESSION['erro']
);


$_SESSION['alert_logout'] = "<div class='alert alert-success text-center my-5' role='alert'>
							Deslogado com sucesso!
						</div>";
header('Location: form-login.php');
exit();