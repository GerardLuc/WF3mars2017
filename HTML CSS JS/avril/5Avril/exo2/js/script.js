// Attendre le chargement du DOM
$(document).ready(function(){

    function mySkills(paramEq, paramWidth){
        // Animation des balises P d'une compétence
        $('h3 + ul').children('li').eq(paramEq).find('p').animate({
            width: paramWidth
        });

    };

    function openModal(){

        $('button').click(function(){
            $('#modal').fadeIn();

        });

        $('.fa-times').click(function(){
            $('#modal').fadeOut();
        })


    }

    

    // Charger le contenu de home.html dans le main
    $('main').load( 'views/home.html');

    /*
        homePage
    */ 
    
    $('h1 + a').click(function(evt){
        // Bloquer le comportement naturel de la balise balise
        evt.preventDefault();

        // Appliquer la fonction slideToggle sur la nav
        $('nav').slideToggle();

    });

    // Burger menu + nav
    $('nav a').click(function(evt){
        evt.preventDefault();

        // masquer le main
        $('main').fadeOut();

        var viewtoLoad = $(this).attr('href');


        // Fermer le burger menu
        $('nav').slideUp(function(){

            // Changer la vue
            $('main').load( 'views/' + viewtoLoad, function(){

                $('main').fadeIn(function(){

                    // vérifier si l'utilisateur veut voir la page about.html
                    if( viewtoLoad == 'about.html' ){

                        // Appeler la fonction mySkills
                        mySkills(0, '88%');
                        mySkills(1, '85%');
                        mySkills(2, '69%');

                    } else if( viewtoLoad == 'portfolio.html' ){
                        openModal();
                    }



                });

            });

        });

    });

});