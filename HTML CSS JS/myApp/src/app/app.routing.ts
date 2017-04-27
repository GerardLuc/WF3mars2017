// importer les class pour configurer les routes
import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// Importer les composants a importer dans les routes
import { HomeComponent } from './components/home/home.component';
import  { AboutComponent } from './components/about/about.component';
import  { PortfolioComponent } from './components/Portfolio/Portfolio.component';
import  { ContactComponent } from './components/contact/contact.component';

// définir les routes
const appRoute: Routes = [
    {
        path: '',
        component: HomeComponent
    },
    {
        path: 'about',
        component: AboutComponent
    },
    {
        path: 'portfolio',
        component: PortfolioComponent
    },
    {
        path: 'contact',
        component: ContactComponent
    }
];

// Exporter la classe du routing
export const Router: ModuleWithProviders = RouterModule.forRoot(appRoute);