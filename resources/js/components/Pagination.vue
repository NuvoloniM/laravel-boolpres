<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>

            <!-- ciclo li per quante pagine ho, fino alla key dell'oggetto chiamata lastPage -->
            <li
            v-for=" page in pagination.lastPage "
            :key="page"
            class="page-item"
            >
                <span class="page-link"> {{ page }} </span>
            </li>

            <li class="page-item"><a class="page-link" href="#">Next</a></li>
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