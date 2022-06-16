<template>
    <div>
        <!-- importo l'index dei post, sarà questa ora la nostra home page -->
        <PostList/>
    </div>
</template>

<script>
import PostList from '../posts/PostList.vue'
export default{
    name: 'HomePage',
    components: {
        PostList
    }
}
</script>
