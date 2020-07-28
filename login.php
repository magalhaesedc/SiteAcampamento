<?php
session_start();
include_once './conexao.php';
include_once './functions.php';

$btnLogin = filter_input(INPUT_POST, 'bt-login', FILTER_SANITIZE_STRING);

if($btnLogin){
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	if((!empty($email)) AND (!empty($senha))){
		$result_usuario = "SELECT id, nome, email, senha FROM acampantes WHERE email=:email LIMIT 1";
		$result_usuario = $conexao->prepare($result_usuario);
		$result_usuario ->bindParam(':email', $email);

		if($result_usuario->execute()){
			$inscricao = $result_usuario->fetch();
			if(make_hash($senha) == $inscricao['senha']){
				$_SESSION['id'] = $inscricao['id'];
				$_SESSION['nome'] = $inscricao['nome'];
				$_SESSION['email'] = $inscricao['email'];
				header("Location: ./protected_pages/acompanhar-inscricao.php");
			}else{
				$_SESSION['alert_msg'] = "<div class='alert alert-danger text-center my-5' role='alert'>
										Login e/ou senha incorreto!
									</div>";
				header("Location: form-login.php");
			}
		}else{
			$_SESSION['alert_msg'] = "<div class='alert alert-danger text-center my-5' role='alert'>
							Página não encontrada!
					   </div>";
			header("Location: form-login.php");
		}
	}else{
		$_SESSION['alert_msg'] = "<div class='alert alert-danger text-center my-5' role='alert'>
								Login e/ou senha incorreto!
							</div>";
		header("Location: form-login.php");
	}
}else{
	$_SESSION['alert_msg'] = "<div class='alert alert-danger text-center my-5' role='alert'>
							Página não encontrada!
					   </div>";
	header("Location: form-login.php");
}
