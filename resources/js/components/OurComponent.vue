<template>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <div v-for="(blog,index) in blogs" class="carousel-item" :class="{active : index == 0}">
                <img :src="`${blog.image}`" alt="First slide">
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OurComponent",
        mounted(){
            this.$store.dispatch('getAllBlogs')
        },
        computed:{
            blogs(){
                return this.$store.getters.getBlogPost
            }
        }
    }
</script>

<style scoped>

</style>
