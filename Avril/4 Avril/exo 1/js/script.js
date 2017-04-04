$(document).ready(function(){ //Attendre le chargement du DOM
    
    // Fonction fadeOut
    $('section').eq(0).children('button').click(function(){

        $('section').eq(0).children('article').fadeOut(500);

    });

    // Fonction fadeIn

    $('section').eq(1).children('button').click(function(){

        $('section').eq(1).children('article').fadeIn(500);

    });

    // Fonction fadeToggle

    $('section').eq(2).children('button').click(function(){

        $('section').eq(2).children('article').fadeToggle(500);

    });

    // Fonction slideUp()
    $('section').eq(3).children('button').click(function(){

        $('section').eq(3).children('article').slideUp(500);

    });

    // Fonction slideDown()
    $('section').eq(4).children('button').click(function(){

        $('section').eq(4).children('article').slideDown(500);

    });

    // Fonction slideToggle()
    $('section').eq(5).children('button').click(function(){

        $('section').eq(5).children('article').slideToggle(500);

    });



}); // Fin d'attente du chargement du DOM'