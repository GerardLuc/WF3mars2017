//  Créer un objet contenant 4 ppts
var users = {
    first: 'nesta',
    second: 'nestor',
    third: 'nesty',
    fourth: 'nessy',
}

// faire une boucle for...in sur l'objet

for( var prop in users ){
    // afficher le nom de la ppt
    console.log( prop );

    console.log( users[prop] );
}