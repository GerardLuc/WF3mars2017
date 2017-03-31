

// Attendre le chargemennt du DOM
$(document).ready(function(){


    // Manipuler le contenu texte du footer
   console.log( $('footer').text() ); 
   $('footer').text('sous la <b>licence MIT</b>');

    // Manipuler le contenu HTML du footer
    console.log( $('footer').html() );    
    $('footer').html('Sous la licence <b>MIT</b>');

    // Créer un objet pour la page d'acceuil

    var homeContent = {
        title: 'bienvenue sur mon site',
        content: 'je suis un <b>texte</b>'
    }

    var portfolioContent = {
        title: 'bienvenue sur mon portfolio',
        content: 'je suis un <b>texte</b>'
    }

    var contactContent = {
        title: 'bienvenue sur ma page contact',
        content: 'je suis un <b>texte</b>'
    }

    // Fonction pour gerer le menu
    function showMyContent(){

        // Capter le clic sur la premiere licence
        $('li').click( function(){

            // Récuperer la valeur de l'attribut data
            var dataValue = $(this).attr('data') ;

            // Modifier le contenu de la balise h2
            $('h2').text( dataValue.title );

            // Modifier le contenu de la balise page
            $('p').html( homeContent.content );


        });

    };


});