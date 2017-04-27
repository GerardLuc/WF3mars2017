$(document).ready(function(){

    // définir une variable
    var boxChecked;

    // fermer la modal
    $('.fa-times, section').click(function(){
        $('#modal').fadeOut();
    });

    // ui checkbox
    $('[type="checkbox"]').click(function(){

        

        // Définir la valeur de boxChecked
        boxChecked = $(this).val();
       
       var checkboxArray = $('[type="checkbox"]').not( $(this));

       for( var i = 0; i < checkboxArray.length; i++ ){
           checkboxArray[i].checked = false;
       };

    //    modifier l'image
        if( $(this).val() == 'First' ){
            $('img').attr('src', 'img/1.png')
        }else if( $(this).val() == 'Second' ){
            $('img').attr('src', 'img/2.png')
        }else if( $(this).val() == 'Third' ){
            $('img').attr('src', 'img/3.png')
        }else{
            $('img').attr('src', 'img/4.jpg')
        }



    });
    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        evt.preventDefault();
        
            /*
                Verifier quelle checkbox est cochée
                afficher une modal avec l'image selectionnée
                reinitialiser le formulaire
            */ 

            if( boxChecked == undefined){
                console.log('vous devez choisir une image')
            } else{ 
                $('#modal').fadeIn();
            }

            
    });
});