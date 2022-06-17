<template>
    <div>
        <h1>Pagina singola del post: {{ post.title }}</h1>
        <!-- Ulteriori info del post -->
        <!-- importo alert errore passandogli i determinati props -->
        <!-- si mostra solo se c'è effettivamente un errore -->
        <Alert
        v-if="isError"
        message="il post non esiste"
        type="danger"
        />
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'PostDetailPage',
        data() {
            return {
                // creo array vuoto che verrà riempito trmite axios dal singolo post richiamato
                post: [],
                isError: false,
            }
        },
        methods: {
            getPost() {
                // chiamata ad axios con parametro dinamico, tramite show mi passo il singolo id che mi serve 
                // metodo di route per ottenere il paramentro $route.params -> me lo sonon passato dall'index, dal bottone show
                // vinee tutto gestito da api.php->postcontroller@show
                axios.get(`http://127.0.0.1:8000/api/posts/${ this.$route.params.id }`)
                    .then((res) => {
                        console.log(res.data);
                        // console.log(data);
                        this.post = res.data;
                    }).catch((err) =>{
                        console.log(err);
                        this.isError = true;
                    })
            }
        },
        mounted() {
            this.getPost();
            console.log( this.$route.params.id );
        }
    }
</script>