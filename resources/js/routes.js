import HomeComponent from './components/blog/home/PublicHome'
import BlogComponent from './components/blog/home/BlogComponent'
import SinglePostComponent from './components/blog/home/SinglePostComponent'

export const routes = [
    {
        path:'/',
        component: HomeComponent
    },
    {
        path:'/blog',
        component: BlogComponent
    },
    {
        path:'/blog/:id/:title',
        component: SinglePostComponent
    },
    {
        path:'/categories/:id',
        component: BlogComponent
    },

]
