// Attendre le chargement du dom
$(document).ready(function(){

    // Supprimer la classe active de la balise h1
    $('h1').removeClass('active');
              
    $('h2').addClass('active');

    // Ajouter ou supprimer la classe hidden a la balise p lorsqu'on clique sur h2
    $('h2').click(function(){
        $('p').toggleClass('hidden')

    })

}) // Fin de la fonction d'attente du chargement du DOM