$(document).ready(function(){ //Fonction d'attente du chargement du DOM

    // Ouvrir Burger menu classique
    $('.fa-bars').click(function(){

        $('nav ul').fadeIn(500);

    });

    // Fermer le burger menu
    $('a').click(function(evt){

        evt.preventDefault();
        $('nav ul').fadeOut(500);

    });

 }); // Fin de la fonction d'attente du chargement du DOM