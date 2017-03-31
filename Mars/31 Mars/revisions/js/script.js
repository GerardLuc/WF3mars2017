// Attendre le chargement du DOM
$(document).ready( function(){

    
    // créer une variable pour le titre ppal du site
    var siteTitle = 'Luc Gerard <span> Etudiant dev frontend</span>';


    // Créer un tableau pour la nav
    var myNav = ['Acceuil', 'Portfolio', 'Contacts'];

    // Créer un objet pour les titres des pages
    var myTitles = {
        Acceuil: 'Bienvenue sur la page d\'Acceuil',
        portfolio: 'Decouvrez mes travaux',
        contact: 'Contactez-moi pour plus d\'informations'
    };

    // Créer un objet pour le contenu des pages
    var myContent = {
        Acceuil: '<h3<Contenu de la page Acceuil</h3><p>MOOOOOOO Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, cupiditate eius commodi. Ipsum vel commodi distinctio, nesciunt quasi harum libero sit quas excepturi in nulla assumenda enim est eius eaque.</p>',
        portfolio: '<h3<Contenu de la page portfolio</h3><p>SBLEH Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, cupiditate eius commodi. Ipsum vel commodi distinctio, nesciunt quasi harum libero sit quas excepturi in nulla assumenda enim est eius eaque.</p>',
        contact: '<h3<Contenu de la page contanc</h3><p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, cupiditate eius commodi. Ipsum vel commodi distinctio, nesciunt quasi harum libero sit quas excepturi in nulla assumenda enim est eius eaque.</p>'

    }

    // Afficher dans la console le header et le mettre dans une variable
    var myHeader = $('Header');

    // Génerer une balise h1 avec le contenu de la variable siteTitle
    myHeader.append('<h1>'+ siteTitle + '</h1>');

    // Générer une balise nav dans le header
    myHeader.append('<nav><i class="fa fa-bars" aria-hidden="true"></i><ul></ul></nav>');

    // Faire une boucle for sur myNav pour générer les liens de la myNav
    for ( var i = 0; i < myNav.length; i++ ){
        console.log( myNav[i] );

        // Génerer des balises html
        $('ul').append('<li><a href="' + myNav[i] + '">' + myNav[i] + '</a></li>');
    }
    // Afficher dans le main le titre issu de l'objet myTitles
    var myMain = $('main');
    myMain.append( '<h2>' + myTitles.Acceuil + '</h2>' )
    myMain.append('<section>' + myContent.Acceuil + '</section>')


    // Capter le click sur les balises a en bloquant le comportement naturel des balises a
    $('a').click( function(evt){

        // Bloquer le comportement naturel de la balise
        evt.preventDefault();

        // Connaitre l'occurence de la balise a sur laquelle l'utilisateur a cliqué
        console.log( $(this) ); 

        // Récupérer la valeur de l'attribut href
        console.log( $(this).attr('href') );

        // Verifier la valeur de l'attribut href pour afficher le bon titre
        if( $(this).attr('href') == 'Acceuil' ){
            // Selectionner la balise h2 pour changer son contenu
            $('h2').text( myTitles.Acceuil);

            // Selectionner la section pour change le contenu
            $('section').html( myContent.Acceuil);


        } else if ($(this).attr('href') == 'Portfolio' ){
            $('h2').text( myTitles.portfolio);
            $('section').html( myContent.portfolio);
        } else{
            $('h2').text( myTitles.contact);
            $('section').html( myContent.contact);
        }

    })







} ); //Fin de la fonction de chargement du DOM