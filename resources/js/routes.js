// importo vue 
import Vue from 'vue'
// importo il gestore delle rotte dopo aver fatto npm i vue-routes@3
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// importo i componenti delle pagine a cui farò riferimento sotto nelle rotte
import HomePage from './components/pages/HomePage.vue';
import ContactPage from './components/pages/ContactPage.vue';
import PostDetailPage from './components/pages/PostDetailPage.vue';
import NotFoundPage from './components/pages/NotFoundPage.vue';

// inizializzo il router
const router = new VueRouter({
    // permette di mantere in memoria le pagine avanti e indietro e la storia del percorso nel sito 
    mode: 'history',
    // possiamo inserire un parametro per specificare chi è attivo
    linkExactActiveClass: 'active',
    // creo la gestione delle rotte come un array di oggetti -> uri -> componente da visualizzare-> nome da richiamare
    routes: [
        { path: '/', component: HomePage , name: 'home' },
        { path: '/contacts', component: ContactPage , name: 'contacts' },
        // il path sarà dinamico, dipende dall'id che mi passo come parametro. in vue usavamo ${} in vue-router usiamo :id per renderlo dinamico
        { path: '/posts/:slug', component: PostDetailPage , name: 'post-detail' },
        // creiamo una notfound pages routes che si attiverà quando verrà richiamata una pagina non gestita dalle rotte precedenti 
        { path: '*', component: NotFoundPage, name: 'notFound'}
    ]
})
// lo esporto per poterlo richiamare in front.js e in #root
export default router;