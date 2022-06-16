<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <Header/>
                    <main>
                        <PostList/>
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from './Header.vue';
import PostList from './posts/PostList.vue';
export default{
    name: "App",
    components: {
        Header,
        PostList,
    }
}
</script>