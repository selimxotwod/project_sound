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
<div class="wrapper">
    <!--SECTION GAUCHE-->
    <section id="section-gauche" class="col-sm-7">
        <!--DESCRIPTION-->
        <div id="description">
            <h1>Fonds marins en danger</h1>
            <img src="./assets/img/poissons.jpg" alt="Poissons">
            <p>Les conséquences de la surpêche sont dramatiques : 85% des effectifs exploités à des fins commerciales de par le monde sont déjà surpêchés ou risquent de l’être à très court terme.</p>
            <p>De nombreuses espèces très importantes pour le marché du poisson sont notamment touchées, comme le flétan de l’Atlantique, la limande, le cabillaud, la baudroie, la sole commune ou le turbot. Et de grands prédateurs, comme le thon rouge et différentes espèces de requins et de raies, sont même en voie d’extinction.</p>
            <p>Au cours des dernières décennies, la pêche en eau profonde s’est très fortement développée. Pour les espèces qui présentent une maturité sexuelle tardive ou un faible taux de reproduction, comme la baudroie, le sébaste ou l’empereur, cela a des conséquences dramatiques.</p>
            <p>Ces espèces vivent souvent à de grandes profondeurs et ont besoin d’une trentaine d’années pour atteindre leur maturité sexuelle. Si des quantités importantes de jeunes poissons sont capturés, c’est toute une population qui est menacée d’extinction à court terme.</p>
            <p>Il est évident qu’une fois surexploités et détruits, ces effectifs seront très difficiles à reconstituer.</p>
            <p>Par ailleurs, on déplore un manque de données sur les stocks de nombreuses espèces fragiles, des données pourtant indispensables à la mise en place d’une gestion durable de la pêche.</p>
        </div>
        <!--COMMENTAIRES-->
        <div id="commentaires">
            <h2>Commentaires</h2>
            <?php foreach($data as $page):?>
            <div class="bloc-commentaire">
                <p class="commentaire"><?=$page->commentaire?></p>
                <p class="nom"><?=$page->prenom?> <?=$page->nom?></p>
                <?php
                $aujourdhui = new DateTime();
                $lancement  = new DateTime($page->date);
                if($aujourdhui->diff($lancement)->format('%d') == '0')
                {
                    ?><p class="date">Aujourd'hui</p><?php
                }
                else
                {
                ?>
                <p class="date"><?=$aujourdhui->diff($lancement)->format('Il y a %d jours');?></p>
                <?php
                }
                ?>
                <div class="clear"></div>
            </div>
            <?php endforeach;?>
            <div id="pagination">
                <ul>
                    <?php

                    for ($i=1; $i <=$nbPage ; $i++) {
                        if ($i ==$cPage) {
                            echo "<li class='active'><a href='#'>$i</a></li> ";
                        }
                        else{
                            echo "<li><a href=\"index.php?a=ajouter&page=$i\">$i </a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <!--SECTION GAUCHE-->
    <!--FORMULAIRE-->
    <section id="section-droite" class="col-sm-offset-1 col-sm-4">
        <h2>Signez notre pétition</h2>
        <p id="signatures"><span><?=$dataSignataire->count?></span> signatures</p>
        <progress value="<?=$dataSignataire->count?>" max="100"></progress>
        <p id="objectif">Objectif : <span>100</span> signatures</p>

        <form action="?a=ajouter&id=<?=$_GET['id']?>" method="post" onsubmit="return verifierFormulaire();" name="inscription">
            <label for="nom">Nom</label>
            <input id="nom" name="nom" type="text" placeholder="Dupond">
            <label for="prenom">Prénom</label>
            <input id="prenom" name="prenom" type="text" placeholder="Pierre">
            <label id="label-email" for="mail">E-mail</label>
            <input id="email" name="mail" type="text" placeholder="pierre.dupond@gmail.com">
            <label for="commentaire-texte">Commentaire</label>
            <textarea id="commentaire-texte" name="commentaire" cols="30" rows="10" placeholder="Cette cause me tient à cœur parce que...(250 caractères max.)"></textarea>
            <input type="submit" value ="Signer">
            <div id="caseErreurs">
            </div>
        </form>
    </section>
</div>
<!--FOOTER-->
<footer id="footer-pages">
    <a href="?a=home">Revivre l'expérience</a>
</footer>

<script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./assets/js/appPetition.js"></script>
<script>
    function verifierFormulaire()
    {
        var formulaire=document.forms["inscription"];
        var erreur=false;
        var texteErreur=new Array();

        var nom=formulaire.elements["nom"];
        if(nom.value.length<2)
        {
            erreur=true;
            texteErreur[texteErreur.length]=" - Veuillez indiquer votre nom"
        }

        var prenom=formulaire.elements["prenom"];
        if(prenom.value.length<3)
        {
            erreur=true;
            texteErreur[texteErreur.length]=" - Veuillez indiquer votre prénom"
        }

        var mail =formulaire.elements["mail"];
        if(mail.value.length<3)
        {
            erreur=true;
            texteErreur[texteErreur.length]=" - Veuillez indiquer votre mail"
        }

        var commentaire =formulaire.elements["commentaire"];
        if(commentaire.value.length<3)
        {
            erreur=true;
            texteErreur[texteErreur.length]=" - Veuillez indiquer votre commentaire"
        }

        if(erreur==true)
        {
            document.getElementById("caseErreurs").innerHTML=(texteErreur.join("</br>"))
            document.getElementById("caseErreurs").style.display=("block");
            document.getElementById("caseErreurs").style.color=("red");

            return false;
        }
        else
        {
            return true;
        }

    }

</script>
</body>
</html>

