// Demander a l'utilisateur de choisir une couleur entre rouge, vert et bleu

var userChoice = prompt('Choisir une couleur entre rouge, jaune, vert ou bleu');
console.log( userChoice );

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
