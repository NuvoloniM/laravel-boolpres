<template>
<div>
    <Header/>
    <main>
        <div class="container">
        <!-- non importo più i vari componenti ma importo direttamente il router, sarà lui dinamicamente a gestire cosa vedo  -->
        <router-view></router-view>
            <!-- <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                            <Header/>
                        <main>
                            <PostList/>
                        </main>
                    </div>
                </div>
            </div> -->
        </div>
    </main>
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