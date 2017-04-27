// Capter l'evenement ready du document pour y ajouter le callback (attendre le chargement du DOM)
$(document).ready(function(){

    // Capter l'evenement focus sur le textarea

    $('textarea').focus(function(){
        console.log('Minimum 10 caracteres')

    })

    // Capter l'evenement scroll sur le header
    $('header').scroll(function(){
        console.log('scroll')
    })

    // Capter l'evenement hover du main
    $('main').hover(function(){
        console.log('hover')
    })

    // Capter l'evenement click sur la balise a
    $('a').click( function(){

        event.preventDefault();
        console.log('clic sur la balise a')

    })

    // Capter la soumission du formulaire
    $('form').submit (function(evt){
        evt.preventDefault();
        console.log('verifier les inputs textareaavant de les envoyer au ficheirs de traitement php')

    });


}); // Fin de la fonction d'attente du chargement du DOM