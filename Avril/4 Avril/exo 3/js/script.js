$(document).ready(function(){ //Fonction d'attente du chargement du DOM

    $('h3').click(function(){

        // Fermer la balise suivant .open
        $('.open').not(this)
        .next().slideUp()
        .prev().removeClass('open')
        .children('.fa').toggleClass('fa-arrow-right').toggleClass('fa-times');

        // Faire un toggle de la class open sur la balise h3
        $(this).toggleClass('open');
        
        // Faire un slide toggle sur la balise suivante
        $(this).next().slideToggle();

        // Afficher dans la console la balise .fa et un toggle sur la classe fa-times
        $(this).children('.fa').toggleClass('fa-arrow-right').toggleClass('fa-times');



    });


 }); // Fin de la fonction d'attente du chargement du DOM