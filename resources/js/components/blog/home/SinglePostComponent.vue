<template>
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{getSinglePost.title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <a href="#">{{getSinglePost.author}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{getSinglePost.created_at}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" :src="`${getSinglePost.image}`" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead" v-html="getSinglePost.long_desc"></p>

                <hr>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form @submit.prevent="addComment()">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="name" v-model="form.name" name="name" :class="{'is-invalid':form.errors.has('name')}">
                                <has-error :form="form" field="name"></has-error>
                                <input class="form-control" type="hidden" v-model="form.blog_id" name="blog_id">
                                <textarea class="form-control" rows="3" v-model="form.comment" name="comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                <div v-for="comment in getSinglePost.comment" class="media mb-4">
                    <div class="media-body">
                        <h5 class="mt-0">{{comment.name}}</h5>
                        <p>{{comment.comment}}</p>
                        <form @submit.prevent="addComment()">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="name" v-model="form.name" name="name" :class="{'is-invalid':form.errors.has('name')}">
                                <has-error :form="form" field="name"></has-error>
                                <input class="form-control" type="text" v-model="form.blog_id" name="blog_id">
                                <input class="form-control" type="text" v-model="form.comment_id" name="comment_id">
                                <textarea class="form-control" rows="3" v-model="form.comment" name="comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Comment with nested comments -->

            </div>

            <!-- Sidebar Widgets Column -->
            <BlogSidebar></BlogSidebar>

        </div>
        <!-- /.row -->

    </div>


</template>

<script>
    import BlogSidebar from '../includes/CategoryComponent'
    export default {
        name: "SinglePostComponent",
        data(){
            return{
                form: new Form({
                   name:'',
                   blog_id: this.$route.params.id,
                   comment:'',
                   comment_id: this.getSinglePost.id
                }),
            }
        },
        components:{
            BlogSidebar
        },
        methods:{
            singlePost(){
                this.$store.dispatch('getBlogById',this.$route.params.id)
            },
            addComment(){
               this.form.post('/add-comment')
                    .then((res)=>{
                        this.singlePost();

                        Toast.fire({
                            icon: 'success',
                            title: 'Comment Added Successfully'
                        })
                    })
            }
        },
        computed:{
            getSinglePost(){
                return this.$store.getters.singlePost
            }
        },
        mounted(){
            this.singlePost()
        },
        watch:{
            $route(to,from){
                this.singlePost()
            }
        }
    }
</script>

<style scoped>

</style>
