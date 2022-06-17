<template>
    <div>
        <!-- loader -->
        <Loader v-if="isLoading" />
        <!-- mostro i dati se l'array dei post non è vuoto -->
        <div v-if="posts.length">

        <!-- importo componente delle pagine, gli devo passare i dati ottenuti da axios tramite props -->
        <!-- dal componente figlio ottengo i dati inerenti alla pagina corrente, mi serve per rendere dinamica la chiamata axios a seconda della pagina  -->
        <!-- per prendermi i dati richiamo la funzione dell'emit nel figlio = 'funzione a cui mando i parametri' -->
        <Pagination :pagination="pagination" @on-page-change="getPosts"/>
        <!-- ciclo i dati dell'array posts !!ricordarsi :key -->
            <div class="card text-center" v-for="post in posts" :key="post.id">
                <div class="card-header">
                    <!-- essendomi passato anche i dati di categoria posso rihiamarli -->
                    {{ post.title }} - Category: {{ post.category.label }}
                </div>
                <div class="card-body">
                    <p class="card-title">
                        <!-- essendomi passato anche i tag che sono un array, posso ciclare anche quelli  -->
                        <span v-for=" tag in post.tags " :key="tag.id" class="badge" :style="`background-color: ${tag.color}`" >{{ tag.label }}</span>
                    </p>
                    <p class="card-text">{{ post.content }}</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    <!-- al posto di a utilizzo il route-link per far gestire tutto al router  -->
                    <!-- oltre al nome indicato nelle routes, posso passarmi dei parametri che mi serviranno per la specifica chiamata di axios -->
                    <router-link :to="{ name: 'post-detail', params: { id: post.id } }" class="btn btn-primary">View</router-link>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <p v-else>Non ci sono post</p>
    </div>
</template>

<script>
// importo axios per poter gestire i dati che gli passo tramite controller come se fosse una chiamata ad un api
import axios from 'axios';
import Loader from '../Loader.vue';
import Pagination from '../Pagination.vue';
export default {
    name: 'PostList',
    components: {
        Loader,
        Pagination,
    },
    data(){
        return {
            // mi creo un array vuoto che verrà riempito da axios con la chiamata
            posts: [],
            // questo sarà l'oggetto con la pagina corrente e l'ultima pagina, dinamici seguendo le richieste di axios =>paginate()
            pagination: {},
            isLoading: true,
        }
    },
    methods: {
        // richiamo axios per poter leggere ed ottwnere i dati dell'api 
        // in axios metto il parametro della pagina iniziale, così partirà sempre da 1
        getPosts(page = 1){
            // nel get metto la rotta del controller 
            // rendo dimanica la chiamata delle pagine, parte da 1 ma dipende dal parametro che ci manda il componente figlio pagination
            axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                    .then( (res)=> {
                        // riempio l'array vuoto in data con gli elementi presi con axios
                        console.log(res.data.posts);
                        // grazie a js 7 posso destrutturare l'oggetto ottenuto in più variabili 
                        //  => entro nell'oggetto e salvo nella variabile che mi interessa quello che trova
                        const {
                            data,
                            current_page,
                            last_page
                        } = res.data.posts;
                        // this.posts = res.data.posts.data;
                        // => posso salvarmi i valori delle variabili in data
                        this.posts = data;
                        // creo un oggetto chiave valore = ai valore che salvo da axios 
                        this.pagination = {
                            currentPage: current_page,
                            lastPage: last_page,
                        }

                    }).then(() => {
                        // solo una volta caricati tutti i dati dall'api -> modifico la variabile così da far mostrare tutto 
                        console.log('terminato il caricamento dei posts')
                        this.isLoading = false;
                    })
        }
    },
    mounted(){
        // richiamo effettivamente il metodo per ttenere i dati con axios
        this.getPosts();
    }
}
</script>

<style lang="scss" scoped>

</style>