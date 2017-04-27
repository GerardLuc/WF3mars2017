// Attendre le chargement du DOM
$(document).ready(function(){
    console.log('Le Dom a fini');
    
    // Code a executer sur la page une fois chargée

    // Le deathSelector
    var deathSelector = $('h3').prev().parent().parent().next().parent().find('main').children('article').find('h3')
    console.log( 'balise selectionnée: ', deathSelector)


    /*
        Les selecteurs jQuery classiques
     */

    // selectionner une balise par son nom
    var myHtmlTag = $('header');
    console.log(myHtmlTag);

    // Selectionner une/des balise(s) par leur classe
    var myClass = $('.myClass');
    console.log(myClass);

    // Selectionner une/des balise(s) par leur ID
    var myId = $('#myId');
    console.log(myId);

    // Selecteur imbriqué
    var myItalic = $('h2 i');
    console.log(myItalic);

    // Selecteur CSS
    var myFooter = $('body> main + footer');
    console.log (myFooter);
    
    /*
        Les seleteurs jQuery spécifiques
     */
    // Sélécteur d'enfants
    var myChildren = $('header').children('button');
    console.log(myChildren);

    // Selecteur de parent
    var myParent = $('h2').parent();
    console.log(myParent);

    // Trouver une balise
    var myH2 = $('main').find('h2');
    console.log(myH2);

    // Selectionner le premier
    var firstBtn = $('button:first');
    console.log(firstBtn);

    // Selectionner le dernier
    var lastBtn = $('button:last');
    console.log(lastBtn);

    // selectionner la nth balise
    var secondLi = $('li').eq(1);
    console.log(secondLi);

    // Selectionner la balise suivante
    var afterMain = $('main').next();
    console.log(afterMain);

    // Selectionnerla balise précédente
    var beforeMain = $('main').prev();
    console.log(beforeMain);
    




}); // fin de la fonction d'attente du chargement du DOM