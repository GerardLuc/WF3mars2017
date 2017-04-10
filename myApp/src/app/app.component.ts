// Importer la classe component
import { Component } from '@angular/core';
import { Router } from '@angular/router';

// Définir le décorateur component({...})
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  constructor(
    private router: Router
  ){}

  private burgerIsOpen = false;

  openBurger(){
  if( this.burgerIsOpen == false){
    this.burgerIsOpen = true;
  }
  else {
      // changer ka valeur de burgerIsOpen
      this.burgerIsOpen = true;
    }
  }

  closeBurger(){
    console.log('fermer le menu')

    this.burgerIsOpen = false;
  }

// Attendre le chargement du composant
  ngOnInit(){
    console.log('Le composant est chargé')

    // Créer une variable pour selectionner le loader en JS
    let loader = document.getElementById('apploader')

    loader.classList.add('closedLoader')
  }

}
