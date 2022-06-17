<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- uso $emit per mandare i dati dal figlio al padre. al click si attiva la funzione on-page-change che manda al padre il parametro current - 1 -->
            <!-- sarà il padre che con questo dato cambierà la chiamata axios -->
            <!-- aggiungo if clause -> mostra il previous solo se siamo nella current page 2 o maggiore -->
            <li v-if="pagination.currentPage > 1" class="page-item" @click="$emit('on-page-change', pagination.currentPage - 1)">
                <!-- levo h metto span perchè non mi serve un link a cui andare  -->
                <span class="page-link">
                    Previous
                </span>
            </li>

            <!-- ciclo li per quante pagine ho, fino alla key dell'oggetto chiamata lastPage -->
            <!-- cambio ruolo al li così fa gli effetti del bottone -->
            <!-- al click mando al padre la pagina corrente, essendo un numero ed essendo anke la :key posso tranquillamente passare solo page -->
            <li
            v-for=" page in pagination.lastPage "
            :key="page"
            class="page-item"
            role="button"
            @click="$emit('on-page-change', page)"
            >
                <span class="page-link"> {{ page }} </span>
            </li>
            <!-- stesso discorso del previous, al padre mando il dato current + 1 tramite emit -->
            <!-- if clause -> mostro solo se effettivamente c'è una pagina successiva, cioè non sono nell'ultima pagina  -->
            <li v-if="pagination.lastPage > pagination.currentPage" class="page-item" @click="$emit('on-page-change', pagination.currentPage + 1)">
                <span class="page-link">
                    Next
                </span>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    name: 'Pagination',
    //Salvo i dati che mi passa la tabella "padre" tramite i props
    props: [
        'pagination'
    ]
}
</script>
<style lang="scss" scoped>

</style>