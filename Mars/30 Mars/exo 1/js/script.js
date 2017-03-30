/*

Créer un tableau contenant 4 prénoms dont le votre
Faire une boucle sur le tableau pour saluer dans la console chacun des prénoms

Afficher un message spécial pour votre prénom (ex salut c'est moi)

*/

var myArray = ['Jacques', 'Johan', 'Janus', 'Luc'];
console.log(myArray);

for( var i = 0; i < myArray.length; i++  ){
    if( myArray[i] == 'Luc'){
        console.log( 'salut c\'est moi');

        // Modifier la balise html
        document.querySelector('p').textcontent = 'salut c\'est moi !';
    } else{
        console.log('Hello' + myArray[i]);
    };
};