var user = 'Luc Gerard';

// Créer une variable de type ARRAY (Tableau)
var myArray = [ 'Du texte', 1979, true, user ];
console.log( myArray );

// Afficher la taille du tableau (nombre d'index)
console.log(  'la taille du tableau est: ' + myArray.length );

// Afficher un des index du tableau
console.log( myArray[0] );
console.log( myArray[2] );

// Ajouter un index dans le tableau
myArray.push( 'Une valeur en plus tahu');
console.log( myArray );

// Supprimer et remplacer des index du tableau
