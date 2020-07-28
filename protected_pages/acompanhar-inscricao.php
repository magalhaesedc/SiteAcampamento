<?php
session_start();
include_once '../conexao.php';

if(empty($_SESSION['id'])){
$_SESSION['alert_msg'] = "<div class='alert alert-danger text-center my-5' role='alert'>
                        ÁREA RESTRITA!
                    </div>";
header("Location: ../form-login.php");
}

$result_usuario = "SELECT id, nome, email, status FROM acampantes WHERE id=:id LIMIT 1";
$result_usuario = $conexao->prepare($result_usuario);
$result_usuario->bindParam(':id', $_SESSION['id']);
$result_usuario->execute();
$usuario = $result_usuario->fetch();
$id = $usuario['id'];
$nome = $usuario['nome'];
$email = $usuario['email'];
$status_inscricao = $usuario['status'];


switch ($status_inscricao) {
    case 'CONFIRMADA':
        $_SESSION['status_inscricao'] = "<span class='badge badge-success py-2 px-4'>CONFIRMADA</span>";
        break;

    case 'EM ANÁLISE':
        $_SESSION['status_inscricao'] = "<span class='badge badge-warning py-2 px-4'>EM ANÁLISE</span>";
        break;
    
    case 'INCOMPLETA':
        $_SESSION['status_inscricao'] = "<span class='badge badge-danger py-2 px-4'>INCOMPLETA</span>";
        break;

    default:
        $_SESSION['status_inscricao'] = "<span class='badge badge-danger py-2 px-4'>ERRO</span>";
        break;
}


$result_pagamento = "SELECT referencia, status FROM pagamentos WHERE id_acampante=:id_acampante LIMIT 1";
$result_pagamento = $conexao->prepare($result_pagamento);
$result_pagamento ->bindParam(':id_acampante', $id);
$result_pagamento->execute();
$pagamento = $result_pagamento->fetch();
$referencia = $pagamento['referencia'];
$status_pagamento = $pagamento['status'];


switch ($status_pagamento) {
    case 'APROVADO':
        $_SESSION['status_pagamento'] = "<span class='badge badge-success py-2 px-4'>APROVADO</span>";
        break;

    case 'PENDENTE':
        $_SESSION['status_pagamento'] = "<span class='badge badge-warning py-2 px-4'>PENDENTE</span>";
        break;

    case 'AUTORIZADO':
        $_SESSION['status_pagamento'] = "<span class='badge badge-primary py-2 px-4'>AUTORIZADO</span>";
        break;

    case 'EM ANÁLISE':
        $_SESSION['status_pagamento'] = "<span class='badge badge-warning py-2 px-4'>EM ANÁLISE</span>";
        break;

    case 'EM MEDIAÇÃO':
        $_SESSION['status_pagamento'] = "<span class='badge badge-info py-2 px-4'>EM MEDIAÇÃO</span>";
        break;

    case 'REJEITADO':
        $_SESSION['status_pagamento'] = "<span class='badge badge-danger py-2 px-4'>REJEITADO</span>";
        break;

    case 'CANCELADO':
        $_SESSION['status_pagamento'] = "<span class='badge badge-danger py-2 px-4'>CANCELADO</span>";
        break;

    case 'DEVOLVIDO':
        $_SESSION['status_pagamento'] = "<span class='badge badge-primary py-2 px-4'>DEVOLVIDO</span>";
        break;

    case 'ESTORNADO':
        $_SESSION['status_pagamento'] = "<span class='badge badge-primary py-2 px-4'>ESTORNADO</span>";
        break;
    
    default:
        $_SESSION['status_pagamento'] = "<span class='badge badge-danger py-2 px-4'>ERRO</span>";
        break;
}


$_SESSION['referencia'] = $referencia;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Edson Magalhaes da Costa">
    <meta name="description" content="O Acampamento é um evento religioso que busca novas maneiras para a evangelização, ser jovem sem deixar de ser santo - Paragominas Pará">
    <meta name="keywords" content="acampamento, simbora, catolico, catolica, paragominas, evento, igreja, santa, luzia, santo, aventura, evangelizacao, espirito, comunhao, cristianismo, barraca, biblia, cardeno, caneta, inscricao, regulamento, rcc, comunidade">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acompanhar Inscrição - Simbora Mais Eu</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
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
                    <img src="../img/logo-branco.svg" alt="">
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

    <!-- Formulário de Inscrição Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="my-4">
                <?php
                    if(isset($_SESSION['msg_sucesso'])){
                        echo $_SESSION['msg_sucesso'];
                        unset($_SESSION['msg_sucesso']);
                    }
                ?>
            </div>
            <div class="text-right">
                <h4><a href="../logout.php" class="badge badge-danger py-2 px-5 mt-1"> SAIR <i class="icon_close"></i></a></h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered mt-4">
                  <tbody>
                    <tr>
                      <th scope="row">Nome:</th>
                      <td colspan="3">
                        <?php
                            echo $nome;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">E-mail:</th>
                      <td colspan="3">
                        <?php
                            echo $email;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Situação da Inscrição:</th>
                      <td class="text-center">
                        <h4>
                            <?php
                                if(isset($_SESSION['status_inscricao'])){
                                    echo $_SESSION['status_inscricao'];
                                    unset($_SESSION['status_inscricao']);
                                }
                            ?>
                        </h4>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-primary"> Editar Dados <i class="icon_pencil-edit"></i></button>
                      </td>
                      <td class="text-center">
                        <button href="#" class="btn btn-danger"> Cancelar Inscrição <i class="icon_close_alt2"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Situação do Pagamento:</th>
                      <td class="text-center">
                        <h4>
                            <?php
                                if(isset($_SESSION['status_pagamento'])){
                                    echo $_SESSION['status_pagamento'];
                                    unset($_SESSION['status_pagamento']);
                                }
                            ?>
                        </h4>
                      </td>
                      <td class="text-center">
                        <a href="detail.php" class="btn btn-info"> Realizar Pagamento <i class="icon_creditcard"></i></a>
                      </td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>   
    </section>
    <!-- Formulário de Inscrição End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="partner-logo owl-carousel">
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-1.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-2.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-3.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-4.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-5.png" alt="">
                    </div>
                </a>
                <a class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-6.png" alt="">
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-text">
                        <div class="ft-logo">
                            <a href="../index.html" class="footer-logo"><img src="../img/logo-preto.svg" alt=""></a>
                        </div>
                        <ul>
                            <li><a href="../index.html">Inicio</a></li>
                            <li><a href="../sobre-nos.html">Sobre Nós</a></li>
                            <li><a href="../blog.html">Blog</a></li>
                            <li><a href="../ajude-nos.html">Ajude-nos</a></li>
                            <li><a href="../contatos.html">Contatos</a></li>
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
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>