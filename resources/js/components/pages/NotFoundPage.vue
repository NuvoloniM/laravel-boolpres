<template>
     <div>
        <h2>Non esiste questa pagina | Error: 404 </h2>
        <!-- tramite @click: attiviamo la funzione interna a vue-router che grazie alla history ricorda la cronologia del percorso e può rornare indietro -->
        <button class="btn btn-secondary" @click="$router.back()">Indietro</button>
    </div>
</template>
<script>
export default {
    name: 'NotFoundPage',
}
</script>
<style lang="scss" scoped>

</style>