/*

Programme pour saluer un utilisateur et afficher son annéee de naissance
    -demander le nom et prénom de l'utilisateur
    -saluer en disant: Bonjour Prénom nom
    -demander l'âge de l'utilisateur
    -afficher l'année de naissance
*/
// Demander le prénom et le nom de l'utilisateur
var firstName = prompt('Quel est ton prénom ?');
var lastName = prompt('Quel est ton nom ?');

// saluer en disant : Bonjour nom prénom
console.log('Bonjour ' + firstName + ' ' + lastName);

// Demander l'age 
var age = prompt('Quelle est ton age');
console.log(age);

// Transformer une variable de type String en type NUMBER
var ageNumber = parseInt(age)
console.log(ageNumber)

// Afficher l'année de naissance 
var currentYear = 2017;
console.log( 'Ton année de naissance est ' + (currentYear - age));

