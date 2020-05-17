<template>
    <div>
        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

                    <h1 class="my-4">All Blogs
                    </h1>

                    <!-- Blog Post -->
                    <div v-for="post in blogPost" class="card mb-4">
                        <img class="card-img-top" :src="`${post.image}`" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{post.title}}</h2>
                            <p class="card-text">{{post.short_desc}}</p>
                            <router-link :to="`blog/${post.id}/${post.title}`" class="btn btn-primary">Read More &rarr;</router-link>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{post.created_at}} by
                            <a href="#">{{post.author}}</a>
                        </div>
                    </div>
                    <!-- Blog Post -->


                </div>

                <!-- Sidebar Widgets Column -->
                <BlogSidebar></BlogSidebar>

            </div>
            <!-- /.row -->

        </div>
    </div>
</template>

<script>
    import BlogSidebar from '../includes/CategoryComponent'
    export default {
        name: "BlogComponent",

        components:{
            BlogSidebar
        },
        mounted(){
            this.$store.dispatch('getAllBlogs')
        },
        computed:{
            blogPost(){
                return this.$store.getters.getBlogPost
            }
        },
        methods:{
            getAllCategoryPost(){
                if(this.$route.params.id!=null){
                    this.$store.dispatch('getBlogByCat',this.$route.params.id)
                } else {
                    this.$store.dispatch('getAllBlogs')
                }

            }
        },
        watch:{
            $route(to,from){
                this.getAllCategoryPost()
            }
        }
    }
</script>

<style scoped>

</style>
