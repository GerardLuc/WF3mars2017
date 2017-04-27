// Séléctionner la balise h1
var myTitle = document.querySelector('h1');

// Afficher le contenu de la balise dans la console
console.log( myTitle.textContent );

// Modifier le contenu texte de la balise
myTitle.textContent = 'Le titre est une tomate';

// Séléctionnet la balise myId
var myId = document.querySelector('#myId');

// Afficherle contenu HTML dans la console
console.log( myId.innerHTML);

// Modifier le contenu HTML de la balise
myId.innerHTML = 'contactez-<b>moi</b> les gars : <a = href="mailto: ledésanusseurdemaltes@PogChamp.sbleh">Mail</a>';

