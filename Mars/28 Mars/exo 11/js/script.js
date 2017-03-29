/*
    Créer une application pour calculer une moyenne
    -L'utilisateur a la possibilité d'ajouter autant de notes qu'il le shouaite
    -lorsqu'il le shouaite, il peut calculer la moyenne des notes
*/

// Variable Globale
var notesArray = []; // Tableau vide
var notesAmount = 0;

// Foncctions
function addNote(){

    //  Demander à l'utilisateur d'ajouter une notes
    var newNote = prompt('Ajouter une note de 0 a 20');

    // Convertir newNote en variable de type number
    var newNoteNumber = parseInt(newNote);
    
    // Ajouter la note dans le tableau
    notesArray.push( newNoteNumber);

    console.log(notesArray);

    // Additionner notesAmount et newNote
    notesAmount += newNoteNumber;
    console.log( notesAmount);
};



function average(){

    // La somme de toutes les notes divisées par le nombre de notes
    var averageNote = notesAmount / notesArray.length;


    // Arrondir le resultat
    var roundAverage = Math.round( averageNote );
    console.log('La moyenne est de ' + roundAverage + '/20')

};

