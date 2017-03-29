/*
    Créer un tableau contenant 4 index:
    -Un string
    -Un number
    -2 boolean differents
    -afficher le tableau
*/

var myArray = ['Potatoes', 21, true, false];
console.log(myArray); 


/*
    Ajouter un string dans le tableau
    afficher le tableau dans la console
*/

myArray.push( 'Truc en plus' );
console.log( myArray );

/* 
    Afficher dans la console la taille du tableau
    Afficher chacun des indes du tableau dans la console
 */

console.log( myArray.length);
console.log( myArray [0] + ' ' + myArray[4]);


/*

Créer un objet contenant 3 ppts:
    -le tableau
    -un prénom
    -un age
    Afficher le tableau dans la console
*/

var myObject = {

    array: myArray,
    name: 'Jan',
    age: 45,
};

console.log( myObject);


/*
    Afficher toutes les ppts de l'objet dans la console une par une
*/

console.log( myObject.array );
console.log( myObject.name );
console.log( myObject.age );

/*
    Modifier la propriété age de l'objetAfficher l'objet dans la console
*/

myObject.age = 25;
console.log( myObject );