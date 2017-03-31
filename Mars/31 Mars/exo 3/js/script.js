// Attendre le chargement du DOM
$(document).ready(function(){


    // Capter la soumission du formulaire
    $('form').submit(function(evt){
        // Bloquer l'envoi naturel du formulaire
        evt.preventDefault();


        // Définir une variable pour le score du formulaire
        var formScore = 0;

        // Connaitre la valeur saisie par l'utilisateur

        var userName = ( $('input').val() );
        console.log( userName );

        // Connaitre le nombre de caracteres dans la valeur
        console.log( userName.length);

        // Connaitre la valeur saisie dans le textarea par l'utilisateur
        var userMessage = ( $('textarea').val() );
        console.log( userMessage.length)


        // Verifier la taille de userName (min. 1 caracteres)
        if( userName.length == 0){
            $('[for="input"] b').text('Champ obligatoire (min 1 caractère)');

        } else{
            console.log( 'userName OK')
            // Incrémenter formScore
            formScore ++;
        }


        // Verifier la taille du message (min 5 caracteres )
        if( userMessage.length < 4){          
            $('[for="textarea"] b').text('Champ obligatoire (min 5 caractère)')  

        } else{
            console.log( 'userMessage OK')
            formScore ++;
        }

        // Afficher formScoredans la console
        console.log(formScore);


        // vérifier que le formulaire est validé
        if( formScore == 2 ){
            console.log('Le formulaire est validé')

            //  => Envoyer les données dans le fichier PHP et attendre la réponse (true/false)

            // Le PHP réponds True!

            // Ajouter le message dans la liste
            $('Section:last').append('<article><h4>' + userMessage + '</h4>' + 'par '+ userName + '</article>')


            // Vider les champs du formulaire
            $('input:not([type="submit"]').val(' ');
            $('textarea').val(' ')

        };

        // Suprimer les messages d'erreur
        $('input, textarea').focus(function(){

            $(this).prev().children('b').text(' ');

        })
        

    })



}) // Fin de la fonction d'attente du chargement du DOM'