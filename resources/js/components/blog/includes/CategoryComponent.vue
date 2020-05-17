<template>
    <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                <form action="">
                <div class="input-group">
                    <input @keyup="realSearch" type="text" class="form-control" placeholder="Search for..." v-model="keyword">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit" @click.prevent="realSearch">Go!</button>
                    </span>
                </div>
                </form>
            </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li v-for="(all,index) in allcategories" v-if="index <= 10">
                                <router-link :to="`/categories/${all.id}`">{{all.cat_name}}</router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li v-for="(all,index) in allcategories" v-if="index > 10">
                                <router-link :to="`/categories/${all.id}`">{{all.cat_name}}</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-4">
            <h5 class="card-header">Latest Blogs</h5>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li v-for="blog in blogs">
                        <img :src="`${blog.image}`" width="100">
                        <router-link :to="`/blog/${blog.id}/${blog.title}`">{{blog.title}}</router-link>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Side Widget -->

    </div>
</template>

<script>
    export default {
        name: "CategoryComponent",
        data(){
            return{
                keyword:''
            }
        },
        mounted() {
            this.$store.dispatch("allCategories")
            this.$store.dispatch('getAllBlogs')

        },
        computed:{
            allcategories(){
                return this.$store.getters.alltheCategories
            },
            blogs(){
                return this.$store.getters.getBlogPost
            }
        },
        methods:{
            realSearch(){
                this.$store.dispatch('searchPost',this.keyword)
            }
        }
    }
</script>

<style scoped>

</style>
