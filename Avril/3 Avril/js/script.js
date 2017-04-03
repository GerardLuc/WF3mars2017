// Attendre le chargement du DOM
$(document).ready(function(){

    
        var avatarWoman = $('#avatarWoman');
        var avatarMan = $('#avatarMan');

        // => avatarWoman capter le click
        avatarWoman.click(function(){

            console.log('Je suis une ' + avatarWoman.val() );
            avatarWoman.prop('checked');

            // Désactiver avatarMan
            avatarMan.prop('checked', false);
            


        });

        // => avatarWoman capter le click
        avatarMan.click(function(){

            console.log('Je suis un ' + avatarMan.val() );
            avatarMan.prop('checked')
            // Désactiver avatarWoman
            avatarWoman.prop('checked', false)
        });


    // Capter la soummission d'un formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement par défaut du formulaire
        evt.preventDefault();

        // Récupérer la valeur de #avatarName
        var avatarName = $('#avatarName').val();
        console.log(avatarName)

        // Variables globales
        var avatarName = $('#avatarName').val();
        var avatarAge = $('#avatarAge').val();

        var avatarStyleTop = $('#avatarStyleTop').val();
        var avatarStyleBottom = $('#avatarStyleBottom').val();
        


        // Vérifier les champs du formulaires
          //  => avatarName min 5 caractères
          if( avatarName.length < 5 ){
            console.log('Min. 5 caractères');
          
            } else {
                console.log('avatarName OK');
            }

            // avatarAge entre 1 et 100

            if(avatarAge == 0 || avatarAge > 100 || avatarAge.length == 0){
                console.log('avatarAge entre 1 et 100 ans')

            } else{
            console.log('avatarAge OK')
            };

            // avatarStyleTop obligatoire
            if( avatarStyleTop == 'null') {
                console.log('vous devez choisir un avatarStyleTop')
            } else {
                console.log('avatarStyleTop OK')
            }

            // avatarStyleBottom obligatoire
            if( avatarStyleBottom == 'null' ){
                console.log('vous devez choisir un avatarStyleBottom')

            } else{
                console.log('avatarStyleBottom OK')
            }

    });


}); // Fin de chargement du DOM