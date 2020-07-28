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
    <title>Acompanhar Inscrição - Simbora Mais Eu</title>

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

    <!-- Formulário de Inscrição Begin -->
    <section class="blog-section spad">
        <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <?php
                if(isset($_SESSION['alert_msg'])){
                    echo $_SESSION['alert_msg'];
                    unset($_SESSION['alert_msg']);
                }
                if(isset($_SESSION['alert_logout'])){
                    echo $_SESSION['alert_logout'];
                    unset($_SESSION['alert_logout']);
                }
            ?>
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Faça seu login para continuar</h5>
                <form class="form-signin" method="POST" action="login.php">
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Digite um e-mail cadastrado" required autofocus>
                    <label for="inputEmail">Endereço de E-mail</label>
                  </div>
                  <div class="form-label-group">
                    <input type="password" id="inputSenha" name="senha" class="form-control" placeholder="Digite sua senha" required>
                    <label for="inputSenha">Senha</label>
                  </div>
                  <input name="bt-login" class="btn btn-lg btn-success btn-block text-uppercase" type="submit" value="ENTRAR">
                </form>
                
              </div>

            </div>
            <div class="text-center">
                <a class="text-primary" href="./informacoes-inscricao.html">Faça sua Inscrição</a>
            </div>
          </div>
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
</body>

</html>