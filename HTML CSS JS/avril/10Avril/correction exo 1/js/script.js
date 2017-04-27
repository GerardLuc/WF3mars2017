$(document).ready(function(){

    // fermer la modal
    $('.fa-times').click(function(){
        $('div').fadeOut;
    });

    $('input, select, textarea').focus(function(){
        $(this).removeClass('error')
    });
    
    $('form').submit(function(evt){
        evt.preventDefault();
        
        var userName = $('[placeholder="Your name*"]');
        var userEmail = $('[placeholder="Your email*"]');
        var userSubject = $('select');
        var formScore = 0;

        // verifier que l'utilisateur a saisi son nom
        if( userName.val().length == 0){
            userName.addClass('error')
        } else {
            formScore ++;
        }

        // verifier que l'utilisateur a saisi au moins 1 caractere
        if( userEmail.val().length < 4){
            userEmail.addClass('error')
        } else {
            formScore ++;
        }

        // verifier que l'utilisateur a saisi au moins 1 caractere
        if( userSubject.val() == 'null'){
            userSubject.addClass('error')
        } else {
            formScore ++;
        }

        // verifier que l'utilisateur a saisi son nom
        if( userMessage.val().length == 0){
            userMessage.addClass('error')
        } else {
            formScore ++;
        }

        if( formScore == 4){
            console.log('t pa 1 pd Twa')
        

        // Blabla du php

        // afficher dans une modale
        $('div span').text( userName.val());
        $('div b').text( userSubject.val());
        $('div p:last').text( userMessage.val());

        $('div').fadeIn();
        }
    });

});