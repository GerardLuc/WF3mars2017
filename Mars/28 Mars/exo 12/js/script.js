// Créer une variable de type objet
var user = {
    firstName: 'Luc',
    lastName: 'Gerard',

    // Ajouter une fonction pour afficher le nom complet
    fullName:function(){
        console.log( this.firstName + ' ' + this.lastName );
    }

};

// afficher l'objet
console.log( user );

// Afficher une ppt de l'objet
console.log( user.firstName );

// Modifier la valeur d'une ppt d'un objet
user.lastName = 'Agamenonne';
console.log( user );

// Appeler la fonction de l'objet
user.fullName();

