<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Commentaires</title>
     <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="left-admin">
        <h1>TABLEAU DE BORD</h1>
        <a href="../?a=home"><h2>Accéder au site</h2></a>
        <ul>
            <a href="?a=list"><li><img src="../assets/img/text-lines.png">COMMENTAIRES</li></a>
            <div class="mini-bar"></div>
            <a href="?a=stats"><li><img src="../assets/img/diagram.png">STATISTIQUES</li></a>
        </ul>
    </div>
    <div class="right-admin">
        <div class="container-admin">

            <h3>COMMENTAIRES</h3>

            <h4>TOUS</h4>
            <div class="bar"></div>

            <select class="select">
                <option value="approuve">Commentaires approuvé</option>
                <option value="desaprouve">Commentaires désapprouvé</option>
            </select>
            <ul class="comment-title">
                <li class="auteur">AUTEUR</li>
                <li class="comment">COMMENTAIRE</li>
                <li class="date">DATE</li>
                <li class="validation"></li>
            </ul>

                <?php foreach($dataValid as $page):?>
            <ul class="valid main-tr">
                <li class="auteur"><?=$page->nom?></br><?=$page->prenom?></li>
                <li class="comment"><?=$page->commentaire?></li>
                <li class="date"><?=$page->date?></li>
                <li class="validation"><a href="?a=list&p=desapprouve&id=<?=$page->id?>" class="desapprouver">DÉSAPPROUVER</a></li>
            </ul>
                <?php endforeach;?>


                <?php foreach($dataUnvalid as $page):?>
            <ul class="unvalid none">
                <li class="auteur"><?=$page->nom?></br><?=$page->prenom?></li>
                <li class="comment"><?=$page->commentaire?></li>
                <li class="date"><?=$page->date?></li>
                <li class="validation"><a href="?a=list&p=approuve&id=<?=$page->id?>" class="approuver">APPROUVER</a></li>
            </ul>
                <?php endforeach;?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            $('.select').change(function() {
                $('.valid').toggleClass("none");
                $('.unvalid').toggleClass("none");
            });

           /* $( document ).ready(function() {
               function selectComment(){
                   console.log('allo');

               }
            });*/
        </script>
    </div>
</body>
</html>