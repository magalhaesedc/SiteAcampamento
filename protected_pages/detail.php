<?php
session_start();

// SDK de Mercado Pago
require 'lib/vendor/autoload.php';

// Configura credenciais
MercadoPago\SDK::setAccessToken('TEST-2171831318822753-062400-47a1dfab39d6e2c53cb112141b1c1a82-139491901');

// Cria um objeto de preferência
$preference = new MercadoPago\Preference();

$nome = $_SESSION['nome'];
$referencia = $_SESSION['referencia'];

// Cria um item na preferência
$item = new MercadoPago\Item();
$item->id = $referencia;
$item->title = "Inscrição - " . $nome;
$item->quantity = 1;
$item->unit_price = 30.00;
$item->currency_id = "BRL";

$preference->items = array($item);

$preference->external_reference = $referencia;

$preference->save();

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
    <header class="header-section header-normal">
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
                        <li class="active"><a href="./informacoes-inscricao.html">Inscrição</a></li>
                        <li><a href="./contatos.html">Contatos</a></li>
                    </ul>
                </nav>
                </nav>
                </nav>
                <a href="./ajude-nos.html" class="primary-btn top-btn">Realizar Doações</a>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Formulário de Inscrição Begin -->
    <section class="abreadcrumb-section">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <h3>Cartão de Crédito e Boleto</h3>
                    <img src="../img/mercado-pago.png" class="img-fluid" alt="Imagem responsiva">
                    <p>Liberação Imediata no Cartão. No Boleto Bancário
                    pode demorar até 24 Horas.</p>
                    <form action="/protected_pages/acompanhar-inscricao.php" method="POST" class="text-center">
                        <script
                            src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                            data-preference-id="<?php echo $preference->id;?>"
                            data-elements-color="#00a859"
                            data-header-color="#00a859"
                            data-button-label="CLIQUE AQUI PARA PAGAR">
                        </script>
                    </form>
                </div>
                <div class="col-md-6 mb-3">
                    <h3>Transferência e Depósito</h3>
                    <img src="../img/deposito.png" class="img-fluid" alt="Imagem responsiva">
                    <p>Precisamos que nos envie o comprovante para a liberação do curso,
                    se for transferência será liberado de Imediato, caso seja depósito
                    ou Doc precisa aguardar o pagamento ser compensado, geralmente de 12 a 24 horas,
                    pode nos mandar o comprovante em nosso WhatsApp (91)992965807 ou no email 
                    contato@simboramaiseu.com.br.</p>
                </div>
            </div>
            <div class="load-more blog-more">
                <a href="./acompanhar-inscricao.php" class="primary-btn my-2">Voltar</a>
            </div>
        </div>
    </section>
    <!-- Formulário de Inscrição End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="partner-logo owl-carousel">
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-1.png" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-2.png" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-3.png" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-4.png" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-5.png" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="../img/partner-logo/logo-6.png" alt="">
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-text">
                        <div class="ft-logo">
                            <a href="#" class="footer-logo"><img src="../img/logo-preto.svg" alt=""></a>
                        </div>
                        <ul>
                            <li><a href="./index.html">Inicio</a></li>
                            <li><a href="./sobre-nos.html">Sobre Nós</a></li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./ajude-nos.html">Ajude-nos</a></li>
                            <li><a href="./contatos.html">Contatos</a></li>
                        </ul>
                        <div class="copyright-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | <a href="./sobre-nos.html">Acampamento Simbora Mais EU</a> <i class="fa fa-heart" aria-hidden="true"></i> Template usado de <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="ft-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <!-- <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a> -->
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
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