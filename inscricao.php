<?php

session_start();

include_once './conexao.php';
include_once './functions.php';
include_once './conexao.php';

//Retorna o nome da extenção do arquivo
function extencaoImagem($nome){
    
    $nomeMinusculo = strtolower($nome);

    if(strpos($nomeMinusculo, "png")){
		return ".png";
	}else if(strpos($nomeMinusculo, "jpeg")){
		return ".jpeg";
	}else if(strpos($nomeMinusculo, "jpg")){
		return ".jpg";
	}else{
		return "";
	}
}

function extencaoDocumento($nome){
    
    $nomeMinusculo = strtolower($nome);

    if(strpos($nomeMinusculo, "png")){
		return ".png";
	}else if(strpos($nomeMinusculo, "jpeg")){
		return ".jpeg";
	}else if(strpos($nomeMinusculo, "pdf")){
		return ".pdf";
	}else if(strpos($nomeMinusculo, "jpg")){
		return ".jpg";
	}else{
		return "";
	}
}

function gravarPagamento($id, $conexao){
    
    $referencia = 2021 + $id;
    $valor = 30;
    $forma_pagamento = "default";
    $status = "default";

    $sql_pagamento = "INSERT INTO pagamentos (referencia, forma_pagamento, status, valor, id_acampante)
	VALUES (:referencia, :forma_pagamento, :status, :valor, :id_acampante)";

	$sql_pagamento = $conexao->prepare($sql_pagamento);
	$sql_pagamento->bindParam(':referencia', $referencia);
	$sql_pagamento->bindParam(':forma_pagamento', $forma_pagamento);
	$sql_pagamento->bindParam(':status', $status);
	$sql_pagamento->bindParam(':valor', $valor);
	$sql_pagamento->bindParam(':id_acampante', $id);

	if ($sql_pagamento->execute()) {
        return true;
    }

    return false;
    
}

function verificarEmail($email, $conexao){
    
	$sql = "SELECT * FROM acampantes WHERE email = :email LIMIT 1";

	$sql = $conexao->prepare($sql);
	$sql ->bindParam(':email', $email);

	$sql->execute();

	if ($sql->rowcount() < 1) {
        return true;
    }

    return false;
}


//Verificar se o usuário pressionou obotão de realizar cadastro, se sim, realiza a inscrição, se não, entra no else
$enviarInscricao = filter_input(INPUT_POST, 'enviarInscricao', FILTER_SANITIZE_STRING);

//echo "enviar inscricao";

if($enviarInscricao){
	
	//echo "dentro do IF enviar inscricao";

	//Recebe o campo e-mail e verifica se já existe	
	$email1 = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$email2 = filter_input(INPUT_POST, 'confirmar-email', FILTER_SANITIZE_STRING);
	$email = ( ($email1 == $email2) and !(empty($email1)) and !(empty($email2)) and ($email1 != null) and ($email2 != null) ) ? $email2 : NULL;

	//Recebe os dados do formulário
	$nomeAux = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$nome = ( !(empty($nomeAux)) and ($nomeAux != null) and (strlen($nomeAux) > 5) ) ? $nomeAux : NULL;
	
	$enderecoAux = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	$endereco = ( !(empty($enderecoAux)) and ($enderecoAux != null) ) ? $enderecoAux : NULL;
	
	$numeroAux = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
	$numero = ( ($numeroAux != null) and ($numeroAux > 0) ) ? $numeroAux : NULL;
	
	$complementoAux = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
	$complemento = ( !(empty($complementoAux)) and ($complementoAux != null) ) ? $complementoAux : NULL;

	$bairroAux = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
	$bairro = ( !(empty($bairroAux)) and ($bairroAux != null) ) ? $bairroAux : NULL;

	$cidadeAux = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
	$cidade = ( !(empty($cidadeAux)) and ($cidadeAux != null) ) ? $cidadeAux : NULL;

	$data_nascimentoAux = filter_input(INPUT_POST, 'data-nascimento', FILTER_SANITIZE_STRING);
	$data_nascimento = ( !(empty($data_nascimentoAux)) and ($data_nascimentoAux != null) ) ? $data_nascimentoAux : NULL;

	$celularAux = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
	$celular = ( !(empty($celularAux)) and ($celularAux != null) and (strlen($celularAux) > 7) ) ? $celularAux : NULL;
	
	$celular_whatsapp = filter_input(INPUT_POST, 'celular-whatsapp', FILTER_SANITIZE_STRING);

	$nome_maeAux = filter_input(INPUT_POST, 'nome-mae', FILTER_SANITIZE_STRING);
	$nome_mae = ( !(empty($nome_maeAux)) and ($nome_maeAux != null) and (strlen($nome_maeAux) > 5) ) ? $nome_maeAux : NULL;
	
	$celular_maeAux = filter_input(INPUT_POST, 'celular-mae', FILTER_SANITIZE_STRING);
	$celular_mae = ( !(empty($celular_maeAux)) and ($celular_maeAux != null) and (strlen($celular_maeAux) > 7) ) ? $celular_maeAux : NULL;
	
	$celular_mae_whatsapp = filter_input(INPUT_POST, 'celular-mae-whatsapp', FILTER_SANITIZE_STRING);
	
	$nome_paiAux = filter_input(INPUT_POST, 'nome-pai', FILTER_SANITIZE_STRING);
	$nome_pai = ( !(empty($nome_paiAux)) and ($nome_paiAux != null) and (strlen($nome_paiAux) > 5) ) ? $nome_paiAux : NULL;
	
	$celular_paiAux = filter_input(INPUT_POST, 'celular-pai', FILTER_SANITIZE_STRING);
	$celular_pai = ( !(empty($celular_paiAux)) and ($celular_paiAux != null) and (strlen($celular_paiAux) > 7) ) ? $celular_paiAux : NULL;
	
	$celular_pai_whatsapp = filter_input(INPUT_POST, 'celular-pai-whatsapp', FILTER_SANITIZE_STRING);

	$nome_responsavelAux = filter_input(INPUT_POST, 'nome-responsavel', FILTER_SANITIZE_STRING);
	$nome_responsavel = ( !(empty($nome_responsavelAux)) and ($nome_responsavelAux != null) and (strlen($nome_responsavelAux) > 5) ) ? $nome_responsavelAux : NULL;
	
	$celular_responsavelAux = filter_input(INPUT_POST, 'celular-responsavel', FILTER_SANITIZE_STRING);
	$celular_responsavel = ( !(empty($celular_responsavelAux)) and ($celular_responsavelAux != null) and (strlen($celular_responsavelAux) > 7) ) ? $celular_responsavelAux : NULL;
	
	$celular_responsavel_whatsapp = filter_input(INPUT_POST, 'celular-responsavel-whatsapp', FILTER_SANITIZE_STRING);
	
	$parentescoAux = filter_input(INPUT_POST, 'parentesco', FILTER_SANITIZE_STRING);
	$parentesco = ( !(empty($parentescoAux)) and ($parentescoAux != null) ) ? $parentescoAux : NULL;
	
	$estado_civil = filter_input(INPUT_POST, 'estado-civil', FILTER_SANITIZE_STRING);
	
	$igrejaAux = filter_input(INPUT_POST, 'igreja', FILTER_SANITIZE_STRING);
	$igreja = ( !(empty($igrejaAux)) and ($igrejaAux != null) ) ? $igrejaAux : NULL;

	$paroquiaAux = filter_input(INPUT_POST, 'paroquia', FILTER_SANITIZE_STRING);
	$paroquia = ( !(empty($paroquiaAux)) and ($paroquiaAux != null) ) ? $paroquiaAux : NULL;

	$comunidadeAux = filter_input(INPUT_POST, 'comunidade', FILTER_SANITIZE_STRING);
	$comunidade = ( !(empty($comunidadeAux)) and ($comunidadeAux != null) ) ? $comunidadeAux : NULL;

	$pastoral_movimentoAux = filter_input(INPUT_POST, 'pastoral-movimento', FILTER_SANITIZE_STRING);
	$pastoral_movimento = ( !(empty($pastoral_movimentoAux)) and ($pastoral_movimentoAux != null) ) ? $pastoral_movimentoAux : NULL;

	$batizado = filter_input(INPUT_POST, 'batizado', FILTER_SANITIZE_STRING);
	
	$eucaristia = filter_input(INPUT_POST, 'eucaristia', FILTER_SANITIZE_STRING);

	$crisma = filter_input(INPUT_POST, 'crisma', FILTER_SANITIZE_STRING);

	$matrimonio = filter_input(INPUT_POST, 'matrimonio', FILTER_SANITIZE_STRING);

	$alergiaAux = filter_input(INPUT_POST, 'alergia', FILTER_SANITIZE_STRING);
	$alergia = ( !(empty($alergiaAux)) and ($alergiaAux != null) ) ? $alergiaAux : NULL;

	$doencaAux = filter_input(INPUT_POST, 'doenca', FILTER_SANITIZE_STRING);
	$doenca = ( !(empty($doencaAux)) and ($doencaAux != null) ) ? $doencaAux : NULL;

	$remedioAux = filter_input(INPUT_POST, 'remedio', FILTER_SANITIZE_STRING);
	$remedio = ( !(empty($remedioAux)) and ($remedioAux != null) ) ? $remedioAux : NULL;

	$horarioAux = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
	$horario = ( !(empty($horarioAux)) and ($horarioAux != null) ) ? $horarioAux : NULL;

	$sabe_nadar = filter_input(INPUT_POST, 'sabe-nadar', FILTER_SANITIZE_STRING);

	$informacoesAux = filter_input(INPUT_POST, 'informacoes', FILTER_SANITIZE_STRING);
	$informacoes = ( !(empty($informacoesAux)) and ($informacoesAux != null) ) ? $informacoesAux : NULL;
	
	$senha1 = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$senha2 = filter_input(INPUT_POST, 'confirmar-senha', FILTER_SANITIZE_STRING);
	$senha = ( ($senha1 == $senha2) and !(empty($senha1)) and !(empty($senha2)) and ($senha1 != null) and ($senha2 != null) ) ? $senha2 : NULL;
	$senhaHash = make_hash($senha);

	//Recebe o nome do arquivo com nome='imagem'
	$nome_imagem_perfil = $_FILES['imagemPerfil']['name'];
	$nome_declaracao = $_FILES['declaracaoResponsabilidade']['name'];
	$nome_documento_responsavel = $_FILES['documentoResponsavel']['name'];
	//var_dump($_FILES['imagemPerfil']); //Verifica os metadados do arquivo

	//Colocar nulo caso não seja selecionado o arquivo
	if(empty($nome_imagem_perfil)){
		$nome_imagem_perfil = NULL;
	}else{
		$nome_imagem_perfil = "imagem-perfil".extencaoImagem($nome_imagem_perfil);
	}
	if(empty($nome_declaracao)){
		$nome_declaracao = NULL;
	}else{
		$nome_declaracao = "declaracao".extencaoDocumento($nome_declaracao);
	}
	if(empty($nome_documento_responsavel)){
		$nome_documento_responsavel = NULL;
	}else{
		$nome_documento_responsavel = "documento-responsavel".extencaoDocumento($nome_documento_responsavel);
	}

	//Persiste os dados no banco de dados
	$result_sql = "INSERT INTO acampantes (nome, endereco, numero, complemento, bairro,
	cidade, data_nascimento, celular, celular_whatsapp, nome_mae, celular_mae, celular_mae_whatsapp,
	nome_pai, celular_pai, celular_pai_whatsapp, nome_responsavel, celular_responsavel,
	celular_responsavel_whatsapp, parentesco, estado_civil, igreja, paroquia, comunidade, 
	pastoral_movimento, batizado, eucaristia, crisma, matrimonio, alergia, doenca, remedio, horario,
	sabe_nadar, informacoes, email, senha, imagem_perfil, declaracao_responsabilidade, documento_responsavel)
	VALUES (:nome, :endereco, :numero, :complemento, :bairro, :cidade,
	:data_nascimento, :celular, :celular_whatsapp, :nome_mae, :celular_mae, :celular_mae_whatsapp,
	:nome_pai, :celular_pai, :celular_pai_whatsapp, :nome_responsavel, :celular_responsavel,
	:celular_responsavel_whatsapp, :parentesco, :estado_civil, :igreja, :paroquia, :comunidade,
	:pastoral_movimento, :batizado, :eucaristia, :crisma, :matrimonio, :alergia, :doenca, :remedio,
	:horario, :sabe_nadar, :informacoes, :email, :senha, :imagem_perfil, :declaracao_responsabilidade,
	:documento_responsavel)";

	$insert_sql_inscricao = $conexao->prepare($result_sql);
	$insert_sql_inscricao->bindParam(':nome', $nome);
	$insert_sql_inscricao->bindParam(':endereco', $endereco);
	$insert_sql_inscricao->bindParam(':numero', $numero);
	$insert_sql_inscricao->bindParam(':complemento', $complemento);
	$insert_sql_inscricao->bindParam(':bairro', $bairro);
	$insert_sql_inscricao->bindParam(':cidade', $cidade);
	$insert_sql_inscricao->bindParam(':data_nascimento', $data_nascimento);
	$insert_sql_inscricao->bindParam(':celular', $celular);
	$insert_sql_inscricao->bindParam(':celular_whatsapp', $celular_whatsapp);
	$insert_sql_inscricao->bindParam(':nome_mae', $nome_mae);
	$insert_sql_inscricao->bindParam(':celular_mae', $celular_mae);
	$insert_sql_inscricao->bindParam(':celular_mae_whatsapp', $celular_mae_whatsapp);
	$insert_sql_inscricao->bindParam(':nome_pai', $nome_pai);
	$insert_sql_inscricao->bindParam(':celular_pai', $celular_pai);
	$insert_sql_inscricao->bindParam(':celular_pai_whatsapp', $celular_pai_whatsapp);
	$insert_sql_inscricao->bindParam(':nome_responsavel', $nome_responsavel);
	$insert_sql_inscricao->bindParam(':celular_responsavel', $celular_responsavel);
	$insert_sql_inscricao->bindParam(':celular_responsavel_whatsapp', $celular_responsavel_whatsapp);
	$insert_sql_inscricao->bindParam(':parentesco', $parentesco);
	$insert_sql_inscricao->bindParam(':estado_civil', $estado_civil);
	$insert_sql_inscricao->bindParam(':igreja', $igreja);
	$insert_sql_inscricao->bindParam(':paroquia', $paroquia);
	$insert_sql_inscricao->bindParam(':comunidade', $comunidade);
	$insert_sql_inscricao->bindParam(':pastoral_movimento', $pastoral_movimento);
	$insert_sql_inscricao->bindParam(':batizado', $batizado);
	$insert_sql_inscricao->bindParam(':eucaristia', $eucaristia);
	$insert_sql_inscricao->bindParam(':crisma', $crisma);
	$insert_sql_inscricao->bindParam(':matrimonio', $matrimonio);
	$insert_sql_inscricao->bindParam(':alergia', $alergia);
	$insert_sql_inscricao->bindParam(':doenca', $doenca);
	$insert_sql_inscricao->bindParam(':remedio', $remedio);
	$insert_sql_inscricao->bindParam(':horario', $horario);
	$insert_sql_inscricao->bindParam(':sabe_nadar', $sabe_nadar);
	$insert_sql_inscricao->bindParam(':informacoes', $informacoes);
	$insert_sql_inscricao->bindParam(':email', $email);
	$insert_sql_inscricao->bindParam(':senha', $senhaHash);
	$insert_sql_inscricao->bindParam(':imagem_perfil', $nome_imagem_perfil);
	$insert_sql_inscricao->bindParam(':declaracao_responsabilidade', $nome_declaracao);
	$insert_sql_inscricao->bindParam(':documento_responsavel', $nome_documento_responsavel);

	if($insert_sql_inscricao->execute()){
		//echo "EXECUTADO";
		//Recuperar último ID inserido no banco de dados
		$ultimo_id = $conexao->lastInsertId();

        //Diretório onde o arquivo vai ser salvo
		$diretorio = './arquivos/upload/' . $ultimo_id.'/';

        //Criar a pasta de foto 
		mkdir($diretorio, 0755);

		if(move_uploaded_file($_FILES['imagemPerfil']['tmp_name'], $diretorio."imagem-perfil".extencaoImagem($nome_imagem_perfil))){
            //echo "Executado";
			if($nome_declaracao != NULL){
				move_uploaded_file($_FILES['declaracaoResponsabilidade']['tmp_name'], $diretorio."declaracao".extencaoDocumento($nome_declaracao));
			}

			if($nome_documento_responsavel != NULL){
				move_uploaded_file($_FILES['documentoResponsavel']['tmp_name'], $diretorio."documento-responsavel".extencaoDocumento($nome_documento_responsavel));
			}

			//Fazer o tratamento caso não consiga criar o pagamento
			gravarPagamento($ultimo_id, $conexao);

			$_SESSION['id'] = $ultimo_id;

            $_SESSION['msg_sucesso'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
						                    <strong>Parabens!</strong> Sua inscrição foi realizada com sucesso!!!
						                    Enviamos em seu e-mail algumas informações uteis sobre sua inscrição.
						                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						                        <span aria-hidden='true'>&times;</span>
						                    </button>
						                </div>
						                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
						                    <strong>Para efetivação de sua inscrição</strong>, realize o pagamento clicando no botão abaixo 'Realizar Pagamento'. Caso alguma falha aconteça com seu pagamento, entre em contatos conosco que teremos o maior prazer em lhe ajudar.  
						                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						                        <span aria-hidden='true'>&times;</span>
						                    </button>
						                </div>";
			header("Location: ./protected_pages/acompanhar-inscricao.php"); 
        }else{
        	excluirCadastro($ultimo_id, $conexao);
        	rmdir($diretorio);
        	//echo "Erro Arquivos";
            $_SESSION['msg_erro'] = "<div class='alert alert-danger' role='alert'>
							            <h4 class='alert-heading'>Inscrição Não Efetuada!</h4>
							            <p>Não foi possível realizar a sua inscrição. Verifique os dados e tente novamente.</p>
							            <hr>
							            <p class='mb-0'>Em caso de dúvida, entre em contato conosco pelo menu 'Contatos'.</p>
							        </div>";
			header("Location: form-inscricao.php"); 
        }   
	}else{
		//echo "Erro Banco";
		$_SESSION['msg_erro'] = "<div class='alert alert-danger' role='alert'>
						            <h4 class='alert-heading'>Inscrição Não Efetuada!</h4>
						            <p>Não foi possível realizar a sua inscrição. Verifique os dados e tente novamente.</p>
						            <hr>
						            <p class='mb-0'>Em caso de dúvida, entre em contato conosco pelo menu 'Contatos'.</p>
						        </div>";
		header("Location: form-inscricao.php");
	}

}else{
	//echo "Erro botão";
	$_SESSION['msg_erro'] = "<div class='alert alert-danger' role='alert'>
						            <h4 class='alert-heading'>Inscrição Não Efetuada!</h4>
						            <p>Não foi possível realizar a sua inscrição. Verifique os dados e tente novamente.</p>
						            <hr>
						            <p class='mb-0'>Em caso de dúvida, entre em contato conosco pelo menu 'Contatos'.</p>
						        </div>";
	header("Location: form-inscricao.php");
}