<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Edson Magalhaes da Costa">
    <meta name="description" content="O Acampamento é um evento religioso que busca novas maneiras para a evangelização, ser jovem sem deixar de ser santo - Paragominas Pará">
    <meta name="keywords" content="acampamento, simbora, catolico, catolica, paragominas, evento, igreja, santa, luzia, santo, aventura, evangelizacao, espirito, comunhao, cristianismo, barraca, biblia, cardeno, caneta, inscricao, regulamento, rcc, comunidade">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscrição - Simbora Mais Eu</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="./index.html">
                    <img src="img/logo-branco.svg" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li><a href="./index.html">Inicio</a></li>
                        <li><a href="./sobre-nos.html">Sobre nós</a></li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./ajude-nos.html">Ajude-nos</a></li>
                        <li class="active"><a>Inscrição</a>
                            <ul class="dropdown">
                                <li><a href="./informacoes-inscricao.html">Faça a sua inscrição</a></li>
                                <li><a href="./form-login.php">Acompanhar Inscrição</a></li>
                            </ul>
                        </li>
                        <li><a href="./contatos.html">Contatos</a></li>
                    </ul>
                </nav>
                <a href="./informacoes-inscricao.html" class="primary-btn top-btn"><i class="fa fa-ticket"></i> Inscreva-se</a>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Realizar Inscrição - 2021</h2>
                        <div class="bt-option">
                            <a href="./index.html">Início</a>
                            <span>Realizar Inscrição</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Formulário de Inscrição Begin -->
    <section class="blog-section spad">
        <div class="container">

        <?php
            if(isset($_SESSION['msg_sucesso'])){
                echo $_SESSION['msg_sucesso'];
                unset($_SESSION['msg_sucesso']);
            }else if(isset($_SESSION['msg_erro'])){
                echo $_SESSION['msg_erro'];
                unset($_SESSION['msg_erro']);
            }
        ?>  
            <!-- class="needs-validation" -->
            <form id="form" class="needs-validation" action="inscricao.php" method="POST" enctype="multipart/form-data" ajax=true novalidate>
                <h4 class="text-center">Dados Pessoais</h4>                
                <hr>
                <div class="form-group">
                    <label for="nome">Nome</label>                
                    <input name="nome" class="form-control" type="text" id="nome" placeholder="Digite o nome completo" required>
                    <div class="invalid-feedback">
                        Campo nome obrigatório!
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="endereco">Endereço</label>
                      <input name="endereco" type="text" class="form-control"  id="endereco" placeholder="Digite o endereço" required>
                      <div class="invalid-feedback">
                        Campo endereço obrigatório!
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="numero">Número do Endereço</label>
                        <input name="numero" type="number" class="form-control"  id="numero" placeholder="Digite o número do endereço" min="1" max="5000" required>
                        <div class="invalid-feedback">
                            Número deverá estar entre 0 e 5000, 0 para S/N. Campo número obrigatório!
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>                
                    <input name="complemento" class="form-control" type="text" id="complemento" placeholder="Digite o complemento">
                    <div class="invalid-feedback">
                        Campo complemento obrigatório!
                    </div>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>                
                    <input name="bairro" class="form-control" type="text" id="bairro" placeholder="Digite o bairro" required>
                    <div class="invalid-feedback">
                        Campo bairro obrigatório!
                    </div>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>                
                    <input name="cidade" class="form-control" type="text" id="cidade" placeholder="Digite a cidade" required>
                    <div class="invalid-feedback">
                        Campo cidade obrigatório!
                    </div>
                </div>
                <div class="form-group">
                    <label for="data-nascimento">Data de Nascimento</label>                
                    <input class="form-control" type="date" id="data-nascimento"
                    name="data-nascimento" placeholder="Digite a data de nascimento" required>
                    <div class="invalid-feedback">
                        Campo data de nascimento obrigatório!
                    </div> 
                </div>
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input class="form-control" type="tel" name="celular" id="celular" placeholder="Digite o número do celular" maxlength="15" required>
                    <div class="invalid-feedback"> 
                        (XX) XXXXX-XXXX. Campo celular obrigatório!
                    </div>
                </div>
                <div class="form-group">                    
                    <fieldset>
                        <label>Esse celular possue Whatsapp cadastrado?</label>
                        <div class="form-check custom-control custom-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="celular-whatsapp" value="1" required> SIM 
                            </label>
                        </div>
                        <div class="form-check custom-control custom-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="celular-whatsapp" value="0" required> NÃO 
                            </label>
                        </div>
                    </fieldset>
                    <div class="invalid-feedback"> 
                        Campo obrgatório. Selecione uma opção!
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="nomeMae">Nome da Mãe</label>
                      <input type="nomeMae" name="nome-mae" class="form-control" id="nomeMae" placeholder="Digite o nome da sua mãe" required>
                      <div class="invalid-feedback"> 
                        Campo nome mãe obrigatório!
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="celularMae">Celular da Mãe</label>
                      <input type="tel" class="form-control" name="celular-mae" id="celularMae" placeholder="Digite o número da sua mãe" required>
                      <div class="invalid-feedback"> 
                        (XX) XXXXX-XXXX. Campo celular obrigatório!
                      </div>
                    </div>
                </div>
                <div class="form-group">                  
                    <fieldset>
                        <label>O celular da sua mãe possue Whatsapp cadastrado?</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" value="1" name="celular-mae-whatsapp" required > SIM 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" value="0" name="celular-mae-whatsapp" required > NÃO 
                            </label>
                        </div>
                    </fieldset>
                    <div class="invalid-feedback">
                        Campo obrigatório. Selecione uma opção!
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="nomePai">Nome do Pai</label>
                      <input type="nomePai" class="form-control" name="nome-pai" id="nomePai" placeholder="Digite o nome do seu pai">
                      <div class="invalid-feedback"> 
                        Campo nome pai obrigatório!
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="celularPai">Celular do Pai</label>
                      <input type="tel" class="form-control" name="celular-pai" id="celularPai" placeholder="Digite o número do seu pai">
                      <div class="invalid-feedback"> 
                        (XX) XXXXX-XXXX. Campo celular obrigatório!
                      </div>
                    </div>
                </div>
                <div class="form-group">                  
                    <fieldset>
                        <label>O celular do seu pai possue Whatsapp cadastrado?</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" value="1" name="celular-pai-whatsapp"> SIM 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" value="0" name="celular-pai-whatsapp"> NÃO 
                            </label>
                        </div>
                    </fieldset>
                    <div class="invalid-feedback">
                        Campo obrigatório. Selecione uma opção!
                    </div>
                </div>
                <div class="form-group">
                    <label>Caso seu responsável não seja seus pais, marque a opção abaixo:</label>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="responsavel" checked>
                        <label class="custom-control-label" for="responsavel">Tenho outra pessoa como responsável</label>
                        <div class="invalid-feedback">Campo obrigatório. Selecione uma opção!</div>
                    </div>
                </div>
                <div id="div-responsavel">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="nomeResponsave">Nome do Responsável</label>
                          <input type="text" class="form-control" name="nome-responsavel" 
                          id="nomeResponsavel" placeholder="Digite o nome do seu responsável" required>
                          <div class="invalid-feedback">
                            Campo nome responsável obrigatório!
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="celularResponsavel">Celular do Responsável</label>
                          <input type="tel" class="form-control" name="celular-responsavel" id="celularResponsavel" placeholder="Digite o número do seu pai" required>
                          <div class="invalid-feedback"> 
                            (XX) XXXXX-XXXX. Campo celular obrigatório!
                          </div>
                        </div>
                    </div>
                    <div class="form-group">                  
                        <fieldset>
                            <label>O celular do seu responsável possue Whatsapp cadastrado?</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input"
                                    id="celularResponsavel-sim" type="radio" value="1"
                                    name="celular-responsavel-whatsapp" required> SIM 
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                    id="celularResponsavel-nao" type="radio" value="0"
                                    name="celular-responsavel-whatsapp" required> NÃO 
                                </label>
                            </div>
                        </fieldset>
                        <div class="invalid-feedback">
                            Campo obrigatório. Selecione uma opção!
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="parentesco" id="parentesco" required>
                            <option value="">Selecione o parentesco</option>
                            <option value="Avó/Avô">Avó/Avô</option>
                            <option value="Tio/Tia">Tio/Tia</option>
                            <option value="Padrinho/Madrinha">Padrinho/Madrinha</option>
                            <option value="Irmão/Irmã">Irmão/Irmã</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <div class="invalid-feedback">
                            Campo obrigatório. Selecione uma opção!
                        </div>
                    </div>
                </div>
                <div class="form-group d-none" id="div-declaracaoResponsabilidade">
                    <label for="declaracaoResponsabilidade">Enviar Declaração de Responsabilidade</label>
                    <input name="declaracaoResponsabilidade" class="form-control btn btn-warning" type="file"
                    id="declaracaoResponsabilidade" accept="image/jpeg, image/png, application/pdf" lang="pt-br"required>
                    <small class="form-text text-muted">Tamanho máximo de 3Mb. Arquivos suportados (PDF, PNG, JPG e JPEG).</small>
                    <div class="invalid-feedback">
                        Você deve selecionar a declaração!
                    </div>
                </div>
                <div class="form-group d-none" id="div-documentoResponsavel">
                    <label for="documentoResponsavel">Enviar Documento do Responsável</label>                
                    <input name="documentoResponsavel" class="form-control btn btn-warning" type="file" 
                    id="documentoResponsavel" accept="image/jpeg, image/png, application/pdf" required>
                    <small class="form-text text-muted">Tamanho máximo de 3Mb. Arquivos suportados (PDF, PNG, JPG e JPEG).</small>
                    <div class="invalid-feedback">
                        Você deve selecionar o documento!
                    </div>
                </div>
                <div class="form-group">                  
                    <fieldset>
                        <label>Estado Civil</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="estado-civil" value="Solteiro" required> Solteiro 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="estado-civil" value="Namorando" required> Namorando 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="estado-civil" value="Junto" required> Junto 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="estado-civil" value="Casado" required> Casado 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="estado-civil" value="Divorciado" required> Divorciado 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="estado-civil" value="Viúvo" required> Viúvo 
                            </label>
                        </div>
                    </fieldset>
                    <div class="invalid-feedback">
                        Campo obrigatório. Selecione uma opção!
                    </div>
                </div>
                <h4 class="text-center">Dados Religiosos</h4>                
                <hr>
                <div class="form-group">
                    <label for="igreja">Igreja</label>                
                    <input class="form-control" type="text" name="igreja" id="igreja" placeholder="Digite a sua igreja">
                    <small>Exemplo: Assembleia de Deus, Adventista, Metodotista, Católica e etc.</small>
                </div>
                <div class="form-group">
                    <label for="paroquia">Paróquia</label>                
                    <input class="form-control" type="text" name="paroquia" id="paroquia" placeholder="Digite a sua paróquia">
                    <small>Deixar em branco caso não tiver.</small> 
                </div>
                <div class="form-group">
                    <label for="comunidade">Comunidade</label>                
                    <input class="form-control" type="text" name="comunidade" id="comunidade" placeholder="Digite a sua comunidade">
                    <small>Deixar em branco caso não tiver.</small> 
                </div>
                <div class="form-group">
                    <label for="pastoral">Pastoral ou Movimento</label>                
                    <input class="form-control" type="text" name="pastoral-movimento" id="pastoral" placeholder="Digite a pastoral ou movimento a qual pertença">
                    <small>Deixar em branco caso não tiver.</small> 
                </div>
                <div class="form-group">
                    <label>Sacramentos</label>                
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="batizado" value="1" type="checkbox">Batizado 
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="eucaristia" value="1" type="checkbox">Eucaristia 
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="crisma" value="1" type="checkbox">Crisma 
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="matrimonio" value="1" type="checkbox">Matrimônio 
                        </label>
                    </div>
                </div>
                <h4 class="text-center">Observações</h4>                
                <hr>
                <div class="form-group">
                    <label for="alergia">Alergia</label>                
                    <input class="form-control" type="text" name="alergia" id="alergia" placeholder="Caso possua, digite suas alergias">
                    <small>Deixar em branco caso não tiver.</small> 
                </div>
                <div class="form-group">
                    <label for="doenca">Doença</label>                
                    <input class="form-control" type="text" name="doenca" id="doenca" placeholder="Caso epossua, digite suas doenças">
                    <small>Deixar em branco caso não tiver.</small> 
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="remedio">Remédio</label>
                      <input type="remedio" class="form-control" name="remedio" id="remedio" placeholder="Caso possua, digite os remédios que precisa tomar">
                      <small>Deixar em branco caso não tiver.</small> 
                    </div>
                    <div class="form-group col-md-6">
                      <label for="horario">Horário</label>
                      <input type="horario" class="form-control" name="horario" id="horario" placeholder="Digite o horário que precisa tomar remédio">
                      <small>Deixar em branco caso não tiver.</small> 
                    </div>
                </div>
                <div class="form-group">                  
                    <fieldset>
                        <label>Sabe nadar?</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" value="1" type="radio" name="sabe-nadar" required> SIM 
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" value="0" type="radio" name="sabe-nadar" required> NÃO 
                            </label>
                        </div>
                    </fieldset>
                    <div class="invalid-feedback"> 
                        Campo obrgatório. Selecione uma opção!
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="informacoes">Informações Complementares</label>
                        <textarea class="form-control" name="informacoes" maxlength="255" id="informacoes" rows="4" placeholder="Caso queira deixar alguma informação que considera importante, descreva aqui."></textarea>
                        <div class="invalid-feedback">
                            Campo obrigatório
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="imagemPerfil">Enviar Foto de Perfil</label>                
                    <input name="imagemPerfil" class="form-control btn btn-warning" type="file"
                    id="imagemPerfil" accept="image/jpeg, image/png, image/jpg" required>
                    <small class="form-text text-muted">Tamanho máximo de 3Mb. Arquivos suportados (PNG, JPG e JPEG).</small>
                    <div class="invalid-feedback">
                        Você deve selecionar uma foto!
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        </div>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu e-mail" aria-describedby="inputGroupPrepend3" required>
                        <div class="invalid-feedback" id="mensagem-confirmar-email1">
                            Digite um e-mail válido.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmar-email">Confirmar E-mail</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        </div>
                        <input type="email" name="confirmar-email" class="form-control" id="confirmar-email" placeholder="Digite seu e-mail" aria-describedby="inputGroupPrepend3" required>
                        <div class="invalid-feedback" id="mensagem-confirmar-email2">
                            Os e-mails precisam ser iguais. Digite um e-mail válido.
                        </div>
                    </div>
                </div>
                <div class="d-none" id="div-resultado-email">
                    <span id="resultado-email"></span>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <div class="input-group">
                        <input type="password" name="senha" class="form-control" id="senha" required>
                        <div class="invalid-feedback">
                            Campo senha obrigatório.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmar-senha" class="col-form-label">Confirmar Senha</label>
                    <div class="input-group">
                        <input type="password" name="confirmar-senha" class="form-control" id="confirmar-senha" required>
                        <div class="invalid-feedback">
                            As senhas precisam ser iguais. Campo senha obrigatório.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h4>Confirmo todos os dados cadastrados acima, estando responsável a qualquer problema ocorrido devido as falhas de preenchimento da mesma e ciente que devo CUMPRIR com todos os deveres e regras expostas no 
                        <a class="text-danger alert-link" href="regulamento_-_acampamento_simbora_mais_eu.php" 
                        target="_blank">REGULAMENTO</a> do acampamento.
                    </h4>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="concordoRegulamento"
                        class="custom-control-input" id="concordoRegulamento" required>
                        <label class="custom-control-label" for="concordoRegulamento">Declaro  para  os  devidos  fins  que  li  e  concordo  integralmente  com  o Regulamento do Acampamento.</label>
                        <div class="invalid-feedback">Você deve aceitar os termos do regulamento antes de realizar a inscrição.</div>
                    </div>
                </div>
                <div class="resultado text-danger"></div>
            <input name="enviarInscricao" type="submit" class="btn btn-success" value="Realizar Inscrição"></input>
            </form>
        </div>
    </section>
    <!-- Formulário de Inscrição End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="partner-logo owl-carousel">
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="img/partner-logo/logo-1.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="img/partner-logo/logo-2.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="img/partner-logo/logo-3.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="img/partner-logo/logo-4.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="img/partner-logo/logo-5.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="img/partner-logo/logo-6.png" alt="">
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-text">
                        <div class="ft-logo">
                            <a href="./index.html" class="footer-logo"><img src="img/logo-preto.svg" alt=""></a>
                        </div>
                        <ul>
                            <li><a href="./index.html">Inicio</a></li>
                            <li><a href="./sobre-nos.html">Sobre Nós</a></li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./ajude-nos.html">Ajude-nos</a></li>
                            <li><a href="./contatos.html">Contatos</a></li>
                        </ul>
                        <div class="copyright-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | <a href="./sobre-nos.html">Acampamento Simbora Mais EU</a> <i class="fa fa-heart" aria-hidden="true"></i> Template usado de <a href="https://colorlib.com" target="_blank">Colorlib</a>. Desenvolvido por <a href="http://lattes.cnpq.br/7457715757671696" target="_blank">Edson Magalhães</a>.
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="ft-social">
                            <a href="https://pt-br.facebook.com/acampamentosimboramaiseuoficial" target="_blank"><i class="fa fa-facebook"></i></a>
                            <!-- <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a> -->
                            <a href="https://www.instagram.com/simbora_mais_eu" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.youtube.com/simboramaiseu" target="_blank"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/inscricao.js"></script>
</body>

</html>