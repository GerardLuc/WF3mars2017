$(document).ready(function(){

    // Capter le click sur le premier boutton
    $('button').eq(0).click(function(){

        // Charger le contenu de views about.html dans la premiere section du main.
        $('section').eq(0).load('views/about.html', function(){

            // Fonction de callBack de la fonction load

            $('section').eq(0).fadeIn();



        });

    });

    $('button').eq(1).click(function(){


        $('section').eq(1).load('views/content.html #portfolio', function(){


            $('section').eq(1).fadeIn();
        });

    });

    $('button').eq(2).click(function(){


        $('section').eq(2).load('views/content.html #contacts', function(){

            // Appeler la fonction submitForm
            submitForm();

            $('section').eq(2).fadeIn();
        });

    });


    // Créer une fonction pour capter la soumission du formulaire
    function submitForm(){
        var formScore = 0;

        // Capter la soumission du formulaire
        $('form').submit(function(evt){
            evt.preventDefault();

            // min 4 caracteres (email) et 5 caracteres (message)
            if( $('[type="email"]').val().length < 4 ){
                console.log('Email manquant')

            } else {
                console.log('Email OK')
                formScore ++;
            }

            if( $('textarea').val().length < 5){
                console.log('Message manquant')
            } else {
                console.log('Message OK')
                formScore ++;
            }

            if( formScore == 2 ){
                console.log('Le formulaire est validé')

                // Envoi  des données vers le fichier PHP
                    // Fichier PHP OK

                    $('aside').append('<h3'+ $('textarea').val +'</h3><p>' + $('[type="email"]').val() + '</p>' );

                    $('form')[0].reset();

            } 

        });

    }    
    
});