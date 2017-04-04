$(document).ready(function(){ //Fonction d'attente du chargement du DOM

    // Ouvrir la modale
    $('button').click(function(){
        $('Section').fadeIn();


    });

    $('.fa').click(function(){

        $(this).parent().parent().parent().fadeOut();

    });

    $('section').not('article').click(function(){

        $(this).fadeOut();

    });

    // Capter les touches du clavier
    $(document).keyup(function(evt){

        console.log(evt.keyCode)

        if(evt.keyCode == 27){
            $('section').fadeOut();
        }

    })


 }); // Fin de la fonction d'attente du chargement du DOM