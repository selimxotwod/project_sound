var description = $('#description');
var formulaire = $('#section-droite');
var sectionGauche = $('#section-gauche');

$( window ).resize(function() {
    if ($(window).width() < 760) {
        description.after(formulaire);
    }else{
        sectionGauche.after(formulaire);
    }
});
$( window ).load(function() {
    if ($(window).width() < 760) {
        description.after(formulaire);
    }else{
        sectionGauche.after(formulaire);
    }
});