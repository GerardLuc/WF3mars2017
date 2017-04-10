// Attendre le chargement du DOM
$(document).ready(function(){

// Créer une fonction pour la géstion du formulaire
    function form(){

        // Capter le focus sur les input
        $('input:not([type="submit"]), textarea').focus(function(){
            console.log('affiches-toi stp')
        });


        // Capter la soumission de mon formulaire
        $('form').submit(function(evt){
            

            // Bloquer le comportement naturel du formulaire
            evt.preventDefault();

            var userName = $('#userName');
            var userEmail = $('#userEmail');
            var userPhone = $('#userPhone');
            var userMessage = $('#userMessage');
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

            if( userPhone.val() == 'null' ){
                $('[for="userPhone"] b').text(' Vous devez choisir un sujet');
            } else{                
                formScore++;
            }

            if( userMessage.val().length < 20){
                $('[for="userMessage"] b').text(' Minimum 10 caracteres');
            } else{
                formScore++;
            }

            if(formScore == 4){

                console.log(' Le formulaire est validé')

                // Envoi du form vers le fichier PHP
                // Le fichier réponds true


                    // Vider les champs du formulaire
                    $(this)[0].reset();
            }

        });

    }

});