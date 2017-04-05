// Attendre le chargement du DOM
$(document).ready(function(){

    /*
        homePage
    */ 
    
    $('.homePage h1 + a').click(function(evt){
        // Bloquer le comportement naturel d ela balise balise
        evt.preventDefault();

        // Appliquer la fonction slideToggle sur la nav
        $('nav').slideToggle();

    });

    // Burger menu + nav
    $('.homePage nav a').click(function(evt){
        evt.preventDefault();

        var linkToOpen = $(this).attr('href');

        // Fermer le burger menu
        $('nav').slideUp(function(){

            // Changer de page
            window.location = linkToOpen
        });

    });


    /*
    aboutPage
    */
        // Capter le click sur le burger menu
        $('.aboutPage h1 + a').click(function(evt){
            // Bloquer le comportement naturel de la balise Appliquer
            evt.preventDefault();

            // Selectionner la nav pour y appliquer une fonction animate
            $('.aboutPage nav').animate({
                left: '0'
            });

        });

        // Burger menu + nav
        $('.aboutPage nav a').click(function(evt){
            evt.preventDefault();

            var linkToOpen = $(this).attr('href');

            // Fermer le burger menu
                $('.aboutPage nav').animate({
                    left:'-100%'

                }, function(){
                // Changer de page
                window.location = linkToOpen

                });
            });


});