// importo vue 
import Vue from 'vue'
// importo il gestore delle rotte dopo aver fatto npm i vue-routes@3
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// importo i componenti delle pagine a cui farò riferimento sotto nelle rotte
import HomePage from './components/pages/HomePage.vue';
import ContactPage from './components/pages/ContactPage.vue';

// inizializzo il router
const router = new VueRouter({
    // permette di mantere in memoria le pagine avanti e indietro e la storia del percorso nel sito 
    mode: 'history',
    // creo la gestione delle rotte come un array di oggetti -> uri -> componente da visualizzare-> nome da richiamare
    routes: [
        { path: '/', component: HomePage , name: 'home' },
        { path: '/contacts', component: ContactPage , name: 'contacts' },
    ]
})
// lo esporto per poterlo richiamare in front.js e in #root
export default router;