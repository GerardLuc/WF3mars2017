$(document).ready(function(){ // Fonction d'attente du chargement du dom

        $('select, textarea').focus(function(){
            $(this).removeClass('error')

        });
                
        // Capter la soumission du formulaire
        $('form').submit(function(evt){
            evt.preventDefault();
            var userMessage = $('textarea');
            var userSelect = $('select');   

            
            var formscore = 0;

                if( userSelect.val() == 'null'){
                    userSelect.addClass('error')

                }else if(userSelect.val() == 'Sushi' ){
                    $('section:first-child img').attr('src', 'img/chat_1.jpg')
                    formscore++;

                }else if(userSelect.val() == 'Maki' ){
                    $('section:first-child img').attr('src', 'img/chat_2.jpg')
                    formscore++;

                }else if(userSelect.val() == 'Sashimi' ){
                    $('section:first-child img').attr('src', 'img/chat_3.jpg')
                    formscore++;

                }else if(userSelect.val() == 'Yakitori' ){
                    $('section:first-child img').attr('src', 'img/chat_4.jpg')
                    formscore++;

                }else {
                    $('section:first-child img').attr('src', 'img/chat_5.jpg')
                    formscore++;
                }

                if( userMessage.val().length == 0){
                    userMessage.addClass('error')
                } else {
                    formscore++;
                }
                

                if (formscore < 2){

                } else{

                    $('form').addClass('cacher');
                    $('form + p').removeClass('cacher')
                }



        });
        

});