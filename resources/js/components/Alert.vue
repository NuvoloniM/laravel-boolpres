<template>
    <!-- bind classe così la posso rendere dinamica con i props -->
    <div :class="`alert alert-${type}`" role="alert">
    <!-- anche il messaggio è dinamico, così importando questo omponente come figlio gli posso passare il messaggio che preferisco -->
        {{ message }}
    </div>    
</template>
<script>
export default {
    name: 'Alert',
    props: [
        'message',
        'type',
    ]
}
</script>
<style lang="scss" scoped>

</style>