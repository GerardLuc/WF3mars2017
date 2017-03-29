/*
    Créer une fonction qui permet a l'utilisateur de choisir une couleur
*/
var userChoice = ' ';
console.log(userChoice)

function chooseColor(){
    // Code a executer lorsque la fonction est appellée
    var userPrompt = prompt('Choisir une couleur entre rouge, jaune, bleu et vert');

    // Assigner la valeur de userPrompt à userChoice
    userChoice = userPrompt;
    console.log(userChoice);

    // Appeler la fonction de traduction
    translateColor( userChoice );
};

// Créer une fonction pour traduire les couleurs
function translateColor( paramColor ){

    console.log( 'Coucou je suis un débile ' + paramColor );

    // Si userchoice = 'rouge'

    if ( userChoice == 'rouge'){
        
        console.log( 'rouge se dit Red en anglais' );
    } else if (userChoice == 'bleu'){

        console.log( 'bleu se dit blue en anglais');
    } else if (userChoice == 'jaune'){

        console.log( 'jaune se dit yellow en anglais')
    }else if (userChoice == 'vert'){

        console.log( 'vert se dit green en anglais')
    } else {
        console.log( 'Je ne connais pas cette couleur... °n°')
    }

    // Rappeler la fonction pour refaire choisir une couleur
    chooseColor();

};

