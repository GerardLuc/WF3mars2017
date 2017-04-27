// Ajouter une classe a une balise
var myTitle = document.querySelector('h1');

// Ajouter une classe à la balise h1
myTitle.classList.add('error');

// Séléctionner la derniere balise p
var myLastP = document.querySelector('p:last-of-type');

// supprimer la classe hidden
myLastP.classList.remove('hidden');

// Séléctionner la balise button
var myButton = document.querySelector('button');

// Capter le clic sur le boutton
myButton.onclick = function(){
    console.log('Clique sur le boutton!')

};