import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store/store';

// --- Admin ---//
import Admin from './layouts/Admin';
//User
import UserIndex from './components/User/Index';
import UserCreate from './components/User/Create';
import UserEdit from './components/User/Edit';
import UserChangePassword from './components/User/ChangePassword';
//End User
// --- Article --- //
//Section
import SectionIndex from './components/Article/Section/Index';
import SectionCreate from './components/Article/Section/Create';
import SectionEdit from './components/Article/Section/Edit';
//End Section
//Category
import ListSectionCategory from './components/Article/Category/ListSectionCategory';
import CategoryCreate from './components/Article/Category/Create';
import CategoryEdit from './components/Article/Category/Edit';
//End Category

//Article
import ListCategoryArticle from './components/Article/ListCategoryArticle';
import ArticleCreate from './components/Article/Create';
import ArticleEdit from './components/Article/Edit';
//End Article
// --- End Article --- //
//Faq
import FaqIndex from './components/Faq/Index';
import FaqCreate from './components/Faq/Create';
import FaqEdit from './components/Faq/Edit'
//End Faq

//Auth
//Layouts
import Auth from './layouts/Auth';
//End layouts
import LoginAdmin from './components/Auth/Login'
//End Auth


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        //Auth
        {
            path: '/login',
            component: Auth,
            children: [
                {
                    path: 'admin',
                    name: 'LoginAdmin',
                    component: LoginAdmin
                }
            ]
        },
        {
            path: '/admin',
            component: Admin,
            children: [
                //user
                {
                    path: '/user',
                    name: 'UserIndex',
                    component: UserIndex
                },
                {
                    path: '/user/create',
                    name: 'UserCreate',
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
                    name: 'SectionIndex',
                    component: SectionIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/section/create',
                    name: 'SectionCreate',
                    component: SectionCreate
                },
                {
                    path: '/section/:id/edit',
                    name: 'SectionEdit',
                    component: SectionEdit
                },
                //Category
                {
                    path: '/list/:id/category',
                    name: 'ListSectionCategory',
                    component: ListSectionCategory
                },
                {
                    path: '/category/create',
                    name: 'CategoryCreate',
                    component: CategoryCreate,
                },
                {
                    path: '/category/:id/edit',
                    name: 'CategoryEdit',
                    component: CategoryEdit,
                },
                //Article
                {
                    path: '/category/:id/article',
                    name: 'ListCategoryArticle',
                    component: ListCategoryArticle
                },
                {
                    path: '/article/create',
                    name: 'ArticleCreate',
                    component: ArticleCreate
                },
                {
                    path: '/article/:id/edit',
                    name: 'ArticleEdit',
                    component: ArticleEdit
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
        }
    ]
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        let auth = store.getters.isAuth;

        if (!auth) {
            next({ name: 'LoginAdmin' })
        } else {
            next()
        }
    } else {
        next()
    }
})

export default router;
