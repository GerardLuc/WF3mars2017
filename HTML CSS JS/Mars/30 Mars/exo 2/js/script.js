/*

    Ajouter une balise HTML danjs le DOM
    -Selectionner le document
    -appliquer la fonction write
    -ajouter ule contenu

*/

document.write('<p>Je suis une tomate générée en JAVASCRIPT</p>');

var names = ['Jacques', 'Johan', 'Janus'];

for( var i = 0; i < names.length; i++ ){
    
    document.write( '<p>Salut ' + names[i] + '</p>' );

};