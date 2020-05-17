export default{
    state:{
        blogpost:[],
        singlepost:[],
        categories:[],
    },
    getters:{
        getBlogPost(state){
            return state.blogpost
        },
        singlePost(state){
            return state.singlepost
        },
        alltheCategories(state){
            return state.categories
        }
    },
    actions:{
        getAllBlogs(context){
            axios.get('/all-blogs')
                .then((res)=>{
                    console.log(res.data.posts)
                    context.commit('getAllBlogPosts',res.data.posts)
                })
        },
        getBlogById(context,payload){
            axios.get('/single-blog/'+payload)
                .then((res)=>{
                    console.log(res.data.post)
                    context.commit('getSingleBlogPost',res.data.post)
                })
        },
        allCategories(context){
            axios.get('/categories')
                .then((res)=>{
                    console.log(res.data.categories)
                    context.commit('getAllCategories',res.data.categories)
                })
        },
        getBlogByCat(context,payload){
            axios.get('/categories-blog/'+payload)
                .then((res)=>{
                    console.log(res.data.post)
                    context.commit('getBlogPostbyCat',res.data.post)
                })
        },
        searchPost(context,payload){
            axios.get('/search?s='+payload)
                .then((res)=>{
                    console.log(res.data.posts)
                    context.commit('getSearchPost',res.data.posts)
                })
        },
    },
    mutations:{
        getAllBlogPosts(state,payload){
            return state.blogpost = payload
        },
        getSingleBlogPost(state,payload){
            return state.singlepost = payload
        },
        getAllCategories(state,payload){
            return state.categories = payload
        },
        getBlogPostbyCat(state,payload){
            return state.blogpost = payload
        },
        getSearchPost(state,payload){
            return state.blogpost = payload
        }
    }
}
