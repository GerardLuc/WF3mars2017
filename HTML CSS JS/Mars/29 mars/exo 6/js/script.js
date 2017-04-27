var userChoice = ' ';

function chooseColor(){
    // Code a executer lorsque la fonction est appellée
    var userPrompt = prompt('Choisir une couleur entre rouge, bleu et vert');

    // Assigner la valeur de userPrompt à userChoice
    userChoice = userPrompt;
    console.log(userChoice);

    // Appeler la fonction de traduction
    translateColor( userChoice );
};

// Créer une fonction pour traduire les couleurs
function translateColor( paramColor ){

    // utilisation du switch
    switch(paramColor){

        // 1er cas :paramColorest égal a 'rouge'
        case 'rouge': console.log('rouge = red'); break;


        // 2eme cas: paramColor= 'vert'
        case 'vert': console.log('vert = green'); break;

        // 3eme cas: paramColor = 'bleu'
        case 'bleu': console.log('bleu = blue'); break;

        // pour tous les autres cas:
        default: console.log('Je suis un peut con et je connais pas la couleur'); break;


    }


}