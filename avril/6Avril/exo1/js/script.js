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

            // Afficher le titre du projet
            var modalTitle = $(this).prev().text();

            $('#modal span').text( modalTitle );

            // Afficher l'image du projet

            var modalImage = $(this).parent().prev().attr('src');

            $('#modal img').attr('src' , modalImage).attr('alt', modalTitle);

            // Animer la modal
            $('#modal').fadeIn();


        });

        $('.fa-times, section').click(function(){
            $('#modal').fadeOut();
        })

            // Capter les touches du clavier
        $(document).keyup(function(evt){

            if(evt.keyCode == 27){
                $('section').fadeOut();
            }

        })

    }

    // Créer une fonction pour la géstion du formulaire
    function contactForm(){

        // Capter le focus sur les input
        $('input:not([type="submit"]), textarea').focus(function(){

            // Selectionner la lalise précédente pour lui ajouter la classe openLabel
            $(this).prev().addClass('openedLabel hideError');

        });

        // Capter le blur sur les inputs et le textarea
        $('input, textarea').blur(function(){

            // Vérifier s'il n'y a pas de caracteres dans le input
            if( $(this).val().length == 0 ){

                // Selectionnerla balise précédente pour supprimaer la classe
                $(this).prev().removeClass();
            };
        });

        // Supprimer le message d'erreur du select
        $('select').focus(function(){
            $(this).prev().addClass('hideError')
        });

        // supprimer le message d'erreur de la chatbox
        $('[type="checkbox"]').focus(function(){
            if( $(this)[0].checked == false ){
                $('form p').addClass('hideError')
            };

        });

        // Fermer la modal
        $('.fa-times, section ').click(function(){
            $('#modal').fadeOut();

        });
           // Capter les touches du clavier
        $(document).keyup(function(evt){

            if(evt.keyCode == 27){
                $('section').fadeOut();
            }

        })

        

        // Capter la soumission de mon formulaire
        $('form').submit(function(evt){
            

            // Bloquer le comportement naturel du formulaire
            evt.preventDefault();

            var userName = $('#userName');
            var userEmail = $('#userEmail');
            var userSubject = $('#userSubject');
            var userMessage = $('#userMessage');
            var checkbox = $('[type="checkbox"]');
            var formScore = 0;


            // Verifier que userName a au minimum 2 caracteres

            if( userName.val().length < 2){
                $('[for="userName"] b').text(' Minimum 2 caracteres');
            } else{
                formScore++;
            }

            if( userEmail.val().length < 5){
                $('[for="userEmail"] b').text(' Minimum 5 caracteres');
            } else{
                formScore++;
            }

            if( userSubject.val() == 'null' ){
                $('[for="userSubject"] b').text(' Vous devez choisir un sujet');
            } else{                
                formScore++;
            }

            if( userMessage.val().length < 20){
                $('[for="userMessage"] b').text(' Minimum 10 caracteres');
            } else{
                formScore++;
            }

            // verifier si la checkbox 
            if( checkbox[0].checked == false ){
                $('form p b').text(' Vous devez accetper les CG');
            } else{
                formScore++;
            };

            if(formScore == 5){

                console.log(' Le formulaire est validé')

                // Envoi du form vers le fichier PHP
                // Le fichier réponds true

                    // ajouter la valeur de username dans la balise h2 span de la modal
                    $('#modal span').text(userName.val() );

                    // afficher la modal
                    $('#modal').fadeIn();

                    // Vider les champs du formulaire
                    $(this)[0].reset();

                    // supprimerles messages d'erreur
                    $('form b').text('');

                    // Replacer les labels
                    $('label').removeClass();
            }

        });



    };    
    
    
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

        // Créer une variable de l'attribut href
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

                    };
                    
                    if( viewtoLoad == 'portfolio.html' ){
                        openModal();
                    };

                    if( viewtoLoad == 'contact.html'){
                            contactForm();
                    }



                });

            });

        });

    });

});