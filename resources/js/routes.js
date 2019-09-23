import Vue from 'vue';
import VueRouter from 'vue-router';

//User
import UserIndex from './components/User/Index';
import UserCreate from './components/User/Create';
import UserEdit from './components/User/Edit';
import UserChangePassword from './components/User/ChangePassword';
//End User

//Section Article
import SectionIndex from './components/Article/Section/Index';
// import SectionShow from './components/Article/Section/Show';
//End Section Article

//Faq
import FaqIndex from './components/Faq/Index';
import FaqCreate from './components/Faq/Create';
import FaqEdit from './components/Faq/Edit'
//End Faq

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        //user
        {
            path: '/user',
            name: 'UserIndex',
            component: UserIndex
        },
        {
            path: '/user/create',
            name: 'user-create',
            component: UserCreate
        },
        {
            path: '/user/changepassword',
            name: 'UserChangePassword',
            component: UserChangePassword
        },
        {
            path: '/user/:id/edit',
            name: 'UserEdit',
            component: UserEdit
        },
        //Section
        {
            path: '/section',
            name: 'section',
            component: SectionIndex
        },
        //Faq
        {
            path: '/faq',
            name: 'FaqIndex',
            component: FaqIndex,
        },
        {
            path: '/faq/create',
            name: 'FaqCreate',
            component: FaqCreate
        },
        {
            path: '/faq/:id/edit',
            name: 'FaqEdit',
            component: FaqEdit
        }
    ]
})

export default router;
