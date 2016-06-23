<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Description ????" />
    <meta name="language" content="fr" />
    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="./assets/css/fonts.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" media="screen and (min-width: 1300px)" href="./assets/css/1300min.css">
    <link rel="stylesheet" media="screen and (max-width: 769px)" href="./assets/css/769max.css">
    <script type="text/javascript" src="./assets/js/jquery-2.2.3.min.js"></script>
    <title>Une simple histoire de pêche</title>
</head>
<body>
<!--HEADER-->
<header id="header-pages">
    <div class="wrapper">
        <a class="hidden-xs" id="petition-revivre" href="?a=home">Revivre l'expérience</a>
        <a id="logo-petition" href="#"><img src="./assets/img/logo-alter.png" alt="Une simple histoire de pêche"></a>
    </div>
</header>
<section id="confirmation">
    <h1>Merci.</h1>
    <p>Aidez-nous d’avantage en partageant votre action sur les réseaux sociaux</p>
    <div id="partage" class="col-xs-offset-2 col-xs-8 col-sm-offset-4 col-sm-4 col-md-offset-5 col-md-2">
        <div class=" col-xs-6"><a id="twitter" href="?a=partager&p=twitter&id=<?=$_GET['id']?>"><i class="icon-twitter"></i></a></div>
        <div class=" col-xs-6"><a id="facebook" href="?a=partager&p=facebook&id=<?=$_GET['id']?>"><i class="icon-facebook"></i></a></div>
    </div>
</section>
<!--FOOTER-->
<footer id="footer-pages" class="footer-confirmation">
    <a href="?a=ajouter">Revenir à la pétition</a>
</footer>
</body>
</html>