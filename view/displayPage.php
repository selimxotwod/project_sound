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

<!--FIXED------------------------------->

<!--nombre de poissons pêchés-->
<div id="nb-poissons" class="spincrement hidden-xs">0</div><span class="hidden-xs" id="nb-poissons-txt">kg de poissons pêchés</span>
<div id="social">
    <a class="hidden-xs" id="volume" target="_blank"><i class="icon-volume"></i></a>
    <a class="hidden-xs" id="no-volume" target="_blank"><i class="icon-no-volume"></i></a>
    <a id="twitter" href="https://twitter.com/HistoirePeche"><i class="icon-twitter"></i></a>
    <a id="facebook" href="https://www.facebook.com/simplehistoiredePeche/?fref=ts&__mref=message_bubble"><i class="icon-facebook"></i></a>
</div>
<!--navigation-->
<nav class="hidden-xs">
    <div id="content">
        <a id="up" class="page-scroll" href="#annee2016">16</a>
        <div id="barre1" class="barre"></div>
        <div id="cercle"><div id="petit-cercle"></div></div>
        <div  id="barre2" class="barre"></div>
        <a  id="down" class="page-scroll" href="#annee2020">30</a>
    </div>
</nav>

<!--ACCUEIL------------------------------->
<section id="accueil">
    <header class="hidden-xs">
        <a href="?a=ajouter">Accéder à la pétition</a>
    </header>
    <audio id="audio-port" loop>
        <source src="./assets/mp3/port-de-peche.mp3">
    </audio>
    <!--oiseaux-->
    <div id="oiseaux" class="hidden-xs">
        <img id="oiseau1" src="./assets/img/gif/oiseau.gif" alt="oiseau1">
        <img id="oiseau2" src="./assets/img/gif/oiseau.gif" alt="oiseau2">
        <img id="oiseau3" src="./assets/img/gif/oiseau.gif" alt="oiseau3">
        <img id="oiseau4" src="./assets/img/gif/oiseau.gif" alt="oiseau4">
        <img id="oiseau5" src="./assets/img/gif/oiseau.gif" alt="oiseau5">
        <img id="oiseau6" src="./assets/img/gif/oiseau.gif" alt="oiseau6">
        <img id="oiseau7" src="./assets/img/gif/oiseau.gif" alt="oiseau7">
        <img id="oiseau8" src="./assets/img/gif/oiseau.gif" alt="oiseau8">
        <img id="oiseau9" src="./assets/img/gif/oiseau.gif" alt="oiseau9">
        <img id="oiseau10" src="./assets/img/gif/oiseau.gif" alt="oiseau10">
        <img id="oiseau11" src="./assets/img/gif/oiseau.gif" alt="oiseau11">
        <img id="oiseau12" src="./assets/img/gif/oiseau.gif" alt="oiseau12">
        <img id="oiseau13" src="./assets/img/gif/oiseau.gif" alt="oiseau13">
        <img id="oiseau14" src="./assets/img/gif/oiseau.gif" alt="oiseau14">
        <img id="oiseau15" src="./assets/img/gif/oiseau.gif" alt="oiseau15">
    </div>
    <a id="logo-home" class="logo-home" href="#"><img class="hidden-xs" src="./assets/img/logo.png" alt="Une simple histoire de pêche"></a>
    <!--mobile-->
    <a class="logo-home" href="#"><img class="visible-xs" src="./assets/img/logo-small.png" alt="Une simple histoire de pêche"></a>
    <div id="casque" class="hidden-xs">
        <i class="icon-casque"></i>
        <p>Pour une expérience optimale,<br>branchez vos écouteurs</p>
    </div>
    <p id="topo">Laissez vous entraîner dans une expérience<br>immersive au coeur des océans.</p>
    <!--vagues-->
    <div id="vagues" class="">
        <img class="vague" id="vague1" src="assets/img/vague1.png" alt="vague1">
        <img class="vague" id="vague2" src="assets/img/vague2.png" alt="vague2">
        <img class="vague" id="vague3" src="assets/img/vague3.png" alt="vague3">
    </div>
    <!--bateau-->
    <img id="bateau" src="./assets/img/gif/bateau.gif" alt="bateau">
    <a id="click-scroll" class="hidden-xs page-scroll col-sm-12" href="#plongee">Scroll</a>
    <div class="wrapper-scroll col-xs-offset-4 col-xs-4"><a class="visible-xs page-scroll" href="#back"></a></div>
    <div class="hidden-xs" id="barre-scroll"></div>
</section><!--accueil-->

<section id="back">
    <audio id="ambiance1" loop>
        <source src="./assets/mp3/ambiance-1.mp3">
    </audio>

    <!--PLONGÉE------------------------------->
    <input id="particles-count" type="text" hidden>
    <div id="particles-js" class="hidden-xs"></div>
    <div id="plongee" class="hidden-xs">
        <div class="annee" id="annee2016">
            <img id="poisson1-1" src="./assets/img/gif/poisson1.gif" alt="poisson" data-parallax='{"x": 1700, "from-scroll": 700,"to-scroll": 2000, "y": 700, "smoothness": 10}'>
            <img id="poisson1-2" src="./assets/img/gif/poisson1.gif" alt="poisson" data-parallax='{"x": 1800, "from-scroll": 700,"to-scroll": 2000, "y": 750, "smoothness": 10}'>
            <img id="poisson1-3" src="./assets/img/gif/poisson1.gif" alt="poisson" data-parallax='{"x": 1600, "from-scroll": 700,"to-scroll": 2000, "y": 730, "smoothness": 10}'>
            <img id="particule1-1" src="./assets/img/gif/particule1.gif" alt="particule" data-parallax='{"x": 400, "from-scroll": 700,"to-scroll": 2000, "y": -1000, "smoothness": 10}'>
            <img id="particule1-2" src="./assets/img/gif/particule1.gif" alt="particule" data-parallax='{"x": 500, "from-scroll": 700,"to-scroll": 2000, "y": -1000, "smoothness": 10}'>
            <img id="particule2-1" src="./assets/img/gif/particule2.gif" alt="particule" data-parallax='{"x": 500, "from-scroll": 1000,"to-scroll": 2000, "y": -1000, "smoothness": 10}'>
            <img id="particule2-2" src="./assets/img/gif/particule2.gif" alt="particule" data-parallax='{"x": 500, "from-scroll": 1100,"to-scroll": 2200, "y": -900, "smoothness": 10}'>
            <p id="2016" data-parallax='{"y": 1500,"to-scroll": 3200, "smoothness": 6}'>Année<span>2016</span></p>
        </div>
        <div class="annee" id="annee2020">
            <img id="poisson2-1" src="./assets/img/gif/poisson2.gif" alt="poisson" data-parallax='{"x": 1700, "from-scroll": 1000,"to-scroll": 3000, "y": -400, "smoothness": 10}'>
            <img id="poisson2-2" src="./assets/img/gif/poisson2.gif" alt="poisson" data-parallax='{"x": 2000, "from-scroll": 1000,"to-scroll": 3000, "y": -200, "smoothness": 10}'>
            <img id="thon1" src="./assets/img/gif/thon-reverse.gif" alt="thon" data-parallax='{"x": -2000, "from-scroll": 1200,"to-scroll": 4000, "y": 200, "smoothness": 10}'>
            <img id="thon2" src="./assets/img/gif/thon-reverse.gif" alt="thon" data-parallax='{"x": -2100, "from-scroll": 1200,"to-scroll": 4000, "y": -200, "smoothness": 10}'>
            <img id="thon3" src="./assets/img/gif/thon-reverse.gif" alt="thon" data-parallax='{"x": -2200, "from-scroll": 1200,"to-scroll": 4000, "y": -300, "smoothness": 10}'>
            <img id="hippocampe" src="./assets/img/gif/hippocampe.gif" alt="hippocampe" data-parallax='{"x": 1500, "from-scroll": 2000,"to-scroll": 4500, "y": -400, "smoothness": 10}'>
            <img id="particule1-3" src="./assets/img/gif/particule1.gif" alt="particule" data-parallax='{"x": 400, "from-scroll": 1200,"to-scroll": 4000, "y": -800, "smoothness": 10}'>
            <img id="particule1-4" src="./assets/img/gif/particule1.gif" alt="particule" data-parallax='{"x": 300, "from-scroll": 1400,"to-scroll": 4000, "y": -700, "smoothness": 10}'>
            <img id="particule2-3" src="./assets/img/gif/particule2.gif" alt="particule" data-parallax='{"x": 700, "from-scroll": 1500,"to-scroll": 4000, "y": -300, "smoothness": 10}'>
            <p id="2020" data-parallax='{"y": 1500,"to-scroll": 4200, "smoothness": 6}'>Année<span>2020</span></p>
        </div>
        <div class="annee" id="annee2030">
            <img id="poisson2-3" src="./assets/img/gif/poisson2.gif" alt="poisson" data-parallax='{"x": 2000, "from-scroll": 1700,"to-scroll": 4000, "y": -600, "smoothness": 10}'>
            <img id="tortue" src="./assets/img/gif/tortue.gif" alt="tortue" data-parallax='{"x": -4000, "from-scroll": 2800,"to-scroll": 5000, "y": -800, "smoothness": 10}'>
            <img id="baleine" src="./assets/img/gif/baleine.gif" alt="baleine" data-parallax='{"x": -2000, "from-scroll": 2800,"to-scroll": 5000, "y": 700, "smoothness": 10}'>
            <img id="baleine2" src="./assets/img/gif/baleine.gif" alt="baleine" data-parallax='{"x": -2200, "from-scroll": 2800,"to-scroll": 5000, "y": 600, "smoothness": 10}'>
            <img id="particule1-5" src="./assets/img/gif/particule1.gif" alt="particule" data-parallax='{"x": 400, "from-scroll": 2000,"to-scroll": 5000, "y": -800, "smoothness": 10}'>
            <img id="particule1-6" src="./assets/img/gif/particule1.gif" alt="particule" data-parallax='{"x": 300, "from-scroll": 2100,"to-scroll": 5000, "y": -700, "smoothness": 10}'>
            <img id="particule2-4" src="./assets/img/gif/particule2.gif" alt="particule" data-parallax='{"x": 700, "from-scroll": 2400,"to-scroll": 6000, "y": -300, "smoothness": 10}'>
            <p id="2030" data-parallax='{"y": 1500,"to-scroll": 5200, "smoothness": 6}'>Année<span>2030</span></p>
        </div>
        <div class="annee" id="annee2040">
            <img id="meduse" src="./assets/img/gif/meduse.gif" alt="méduse" data-parallax='{"x": 2200, "from-scroll": 3800,"to-scroll": 5000, "y": 900, "smoothness": 10}'>
            <p id="2040" data-parallax='{"y": 1500,"to-scroll": 6200, "smoothness": 6}'>Année<span>2040</span></p>
        </div>
        <div class="annee" id="annee2048">
            <p id="2048" data-parallax='{"y": 1500,"to-scroll": 8200, "smoothness": 6}'>Année<span>2048</span></p>
            <img id="arrete1" src="./assets/img/arrete1.png" alt="arrête">
            <!--<img id="arrete2" src="./assets/img/arrete1.png" alt="arrête">
            <img id="arrete3" src="./assets/img/arrete1.png" alt="arrête">
            <img id="arrete4" src="./assets/img/arrete2.png" alt="arrête">
            <img id="arrete5" src="./assets/img/arrete2.png" alt="arrête">
            <img id="arrete6" src="./assets/img/arrete2.png" alt="arrête">-->
        </div>
    </div>

    <!--MESSAGE-------------------------------->

    <div id="message" class="row">
        <h1 class="col-xs-12">La pêche intensive détruit<br>les fonds marins</h1>
        <p class="col-sm-offset-2 col-sm-8">Chaque année, environ 82 millions de tonnes de poisson sont pêchées par de gigantesques bateaux-usines. C'est quatre fois plus qu’il y a 50 ans. De nombreuses espèces sont déjà en voie d’extinction ou menacées de surpêche.</p>
        <div class="col-sm-12"><a id="petition-acces" href="?a=ajouter">Signer la pétition</a></div>
        <a class="col-sm-12 hidden-xs" id="home-revivre" href="">Revivre l'expérience</a>
    </div>

</section><!--back-->

<!--A PROPOS-------------------------------->

<section id="propos">
    <h2>À propos</h2>
    <div></div>
    <p class="col-sm-offset-2 col-sm-8">Nous sommes une équipe composée de cinq étudiants en développement web à HETIC. Motivés par une envie de créer une véritable expérience pour notre projet de fin d’année, nous avons choisi de sensibiliser les consommateurs aux problèmes de la surpêche.</p>
    <ul class="row">
        <li class="col-sm-offset-0 col-sm-4 col-lg-offset-1 col-lg-2">
            <h3>Selim Cumur</h3>
            <p>Développeur Back</p>
            <p>« Le plus grand plaisir dans la vie est de réaliser ce que les autres vous pensent incapable de réaliser »</p>
        </li>
        <li class="col-sm-4 col-lg-2 big">
            <h3>Esther de Saint Blanquat</h3>
            <p>Chef de Projet</p>
            <p>« Remettre en question sa façon de vivre c'est voir plus loin »</p>
        </li>
        <li class="col-sm-4 col-lg-2">
            <h3>Marie-Lise Ton</h3>
            <p>Designer</p>
            <p>« En travaillant ensemble et réunissant nos richesses nous pouvons accomplir de grandes choses »</p>
        </li>
        <li class="col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-2">
            <h3>Raphaël Marquand</h3>
            <p>Communication</p>
            <p>« Tourne toi vers le soleil, l'ombre sera derrière toi »</p>
        </li>
        <li class="col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-2">
            <h3>Hugo Prieto</h3>
            <p>Designer</p>
            <p>« Tôt ou tard, la vie te donnera ce que tu mérites »</p>
        </li>
    </ul>
</section><!--à propos-->

<footer id="footer-pages">
    <a id="contact" href="mailto:histoiredepeche@gmail.net">Nous contacter</a>
</footer>

<script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>
<script src="./assets/js/jquery.easing.min.js"></script>
<script src="./assets/js/jquery.smoothState.min.js"></script>
<script src="./assets/js/scrolling-nav.js"></script>
<script src="./assets/js/particles.js"></script>
<script src="./assets/js/jquery.animateNumber.min.js"></script>
<script src="./assets/js/jquery.parallax-scroll.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="./assets/js/buzz.min.js"></script>
<script type="text/javascript" src="./assets/js/app.js"></script>
<script>
    /*$( document ).ready(function() {
        var down = false;
        $(window).scroll(function () {
            console.log('message : ' + $('#message').offset().top);
            console.log('scroll : ' + ($(window).scrollTop());
            console.log('down : ' + down);
            if (($(window).scrollTop() >= $('#message').offset().top) && down == false) {
                down = true;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "index.php?a=down", true);
                xhttp.send();
                console.log('scroll');
            }
        });
    });*/
</script>
</body>
</html>
