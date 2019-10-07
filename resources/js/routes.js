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
import SectionArticleIndex from './components/Article/Section/Index';
import SectionArticleCreate from './components/Article/Section/Create';
import SectionArticleEdit from './components/Article/Section/Edit';
//End Section
//Category
import ListSectionCategoryArticle from './components/Article/Category/ListSectionCategory';
import CategoryArticleCreate from './components/Article/Category/Create';
import CategoryArticleEdit from './components/Article/Category/Edit';
//End Category

//Article
import ListCategoryArticle from './components/Article/ListCategoryArticle';
import ArticleCreate from './components/Article/Create';
import ArticleEdit from './components/Article/Edit';
//End Article
// --- End Article --- //

// --- Page --- //
//Section
import SectionPageIndex from './components/Page/Section/Index';
import SectionPageCreate from './components/Page/Section/Create';
import SectionPageEdit from './components/Page/Section/Edit';
//End Section

//Category
import ListSectionCategoryPage from './components/Page/Category/ListSectionCategory';
import CategoryPageCreate from './components/Page/Category/Create';
import CategoryPageEdit from './components/Page/Category/Edit';
//End Category

//Page
import ListCategoryPage from './components/Page/ListCategoryPage';
import PageCreate from './components/Page/Create';
import PageEdit from './components/Page/Edit';
//End Page
// --- End Page ---/


//Faq
import FaqIndex from './components/Faq/Index';
import FaqCreate from './components/Faq/Create';
import FaqEdit from './components/Faq/Edit'
//End Faq

// Agency
import AgencyIndex from './components/Agency/Index';
import AgencyCreate from './components/Agency/Create';
import AgencyEdit from './components/Agency/Edit';
// End Agency
// --- End Admin --//

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
                    component: UserIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/user/create',
                    name: 'UserCreate',
                    component: UserCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/user/changepassword',
                    name: 'UserChangePassword',
                    component: UserChangePassword,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/user/:id/edit',
                    name: 'UserEdit',
                    component: UserEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Section Article
                {
                    path: '/section/article',
                    name: 'SectionArticleIndex',
                    component: SectionArticleIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/section/article/create',
                    name: 'SectionArticleCreate',
                    component: SectionArticleCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/section/article/:id/edit',
                    name: 'SectionArticleEdit',
                    component: SectionArticleEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Category Article
                {
                    path: '/list/:id/category/article',
                    name: 'ListSectionCategoryArticle',
                    component: ListSectionCategoryArticle,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/category/article/create',
                    name: 'CategoryArticleCreate',
                    component: CategoryArticleCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/category/article/:id/edit',
                    name: 'CategoryArticleEdit',
                    component: CategoryArticleEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Article
                {
                    path: '/category/:id/article',
                    name: 'ListCategoryArticle',
                    component: ListCategoryArticle,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/article/create',
                    name: 'ArticleCreate',
                    component: ArticleCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/article/:id/edit',
                    name: 'ArticleEdit',
                    component: ArticleEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Section Page
                {
                    path: '/section/page',
                    name: 'SectionPageIndex',
                    component: SectionPageIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/section/page/create',
                    name: 'SectionPageCreate',
                    component: SectionPageCreate
                },
                {
                    path: '/section/page/:id/edit',
                    name: 'SectionPageEdit',
                    component: SectionPageEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                // Category page
                {
                    path: '/list/:id/category/page',
                    name: 'ListSectionCategoryPage',
                    component: ListSectionCategoryPage,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/category/page/create',
                    name: 'CategoryPageCreate',
                    component: CategoryPageCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/category/page/:id/edit',
                    name: 'CategoryPageEdit',
                    component: CategoryPageEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                // Page
                {
                    path: '/category/:id/page',
                    name: 'ListCategoryPage',
                    component: ListCategoryPage,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/page/create',
                    name: 'PageCreate',
                    component: PageCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/page/:id/edit',
                    name: 'PageEdit',
                    component: PageEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Faq
                {
                    path: '/faq',
                    name: 'FaqIndex',
                    component: FaqIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/faq/create',
                    name: 'FaqCreate',
                    component: FaqCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/faq/:id/edit',
                    name: 'FaqEdit',
                    component: FaqEdit
                },
                //Agency
                {
                    path: '/agency',
                    name: 'AgencyIndex',
                    component: AgencyIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/agency/create',
                    name: 'AgencyCreate',
                    component: AgencyCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/agency/:id/edit',
                    name: 'AgencyEdit',
                    component: AgencyEdit,
                    meta: {
                        requiresAuth: true,
                    }
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
