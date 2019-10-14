import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store/store';

//Dashboard
import DashboardIndex from './components/Dashboard/Index';
//End Dashboard
// --- Admin ---//
import Admin from './layouts/Admin';
//User
import UserChangePassword from './components/User/ChangePassword';
//Admin
import UserAdminIndex from './components/User/Admin/Index';
import UserAdminCreate from './components/User/Admin/Create';
//EndAdmin
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
// --- End Page ---//

// --- Proposal ---//
import ProposalCategoryIndex from './components/Proposal/Category/Index';
import ProposalCategoryCreate from './components/Proposal/Category/Create';
import ProposalCategoryEdit from './components/Proposal/Category/Edit';

import ProposalCooperationTargetIndex from './components/Proposal/CooperationTarget/Index';
import ProposalCooperationTargetCreate from './components/Proposal/CooperationTarget/Create';
import ProposalCooperationTargetEdit from './components/Proposal/CooperationTarget/Edit';

import ProposalTypeOfCooperationIndex from './components/Proposal/TypeOfCooperation/Index';
import ProposalTypeOfCooperationCreate from './components/Proposal/TypeOfCooperation/Create';
import ProposalTypeOfCooperationEdit from './components/Proposal/TypeOfCooperation/Edit';

import ProposalSubtanceCooperationIndex from './components/Proposal/SubtanceCooperation/Index';
import ProposalSubtanceCooperationCreate from './components/Proposal/SubtanceCooperation/Create';
import ProposalSubtanceCooperationEdit from './components/Proposal/SubtanceCooperation/Edit';

import ProposalSubmissionCooperationIndex from './components/Proposal/SubmissionCooperation/Index';
// import ProposalSubmissionCooperationCreate from './components/Proposal/SubmissionCooperation/Create';
// import ProposalSubmissionCooperationDetail from './components/Proposal/SubmissionCooperation/Detail';

// --- End Proposal --- //

// --- Banner --- //
//Category
import BannerCategoryIndex from './components/Banner/Category/Index';
import BannerCategoryCreate from './components/Banner/Category/Create';
import BannerCategoryEdit from './components/Banner/Category/Edit';

//Banner
import BannerListCategory from './components/Banner/BannerListCategory';
import BannerCreate from './components/Banner/Create';
import BannerEdit from './components/Banner/Edit';
// --- End Banner //

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

// Testimoni
import TestimoniIndex from './components/Testimoni/Index';
import TestimoniCreate from './components/Testimoni/Create';
// EndTestimoni
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
            meta: {
                login: 'login',
            },
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
                    path: '/user/change/password',
                    name: 'UserChangePassword',
                    component: UserChangePassword,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/user/admin',
                    name: 'UserAdminIndex',
                    component: UserAdminIndex,
                    meta: {
                        requiresAuth: true
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
                    component: FaqEdit,
                    meta: {
                        requiresAuth: true,
                    }
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
                },
                //Proposal Category
                {
                    path: '/proposal/category',
                    name: 'ProposalCategoryIndex',
                    component: ProposalCategoryIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/proposal/category/create',
                    name: 'ProposalCategoryCreate',
                    component: ProposalCategoryCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/proposal/category/:id/edit',
                    name: 'ProposalCategoryEdit',
                    component: ProposalCategoryEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Proposal Cooperation Target
                {
                    path: '/proposal/cooperation/target',
                    name: 'ProposalCooperationTargetIndex',
                    component: ProposalCooperationTargetIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/proposal/cooperation/target/create',
                    name: 'ProposalCooperationTargetCreate',
                    component: ProposalCooperationTargetCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/proposal/cooperation/target/:id/edit',
                    name: 'ProposalCooperationTargetEdit',
                    component: ProposalCooperationTargetEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Proposal Type of Cooperation
                {
                    path: '/proposal/typeof/cooperation',
                    name: 'ProposalTypeOfCooperationIndex',
                    component: ProposalTypeOfCooperationIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/proposal/typeof/cooperation/create',
                    name: 'ProposalTypeOfCooperationCreate',
                    component: ProposalTypeOfCooperationCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/proposal/typeof/cooperation/:id/edit',
                    name: 'ProposalTypeOfCooperationEdit',
                    component: ProposalTypeOfCooperationEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Proposal Subtance Cooperation
                {
                    path: '/proposal/subtance/cooperation',
                    name: 'ProposalSubtanceCooperationIndex',
                    component: ProposalSubtanceCooperationIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/proposal/subtance/cooperation/create',
                    name: 'ProposalSubtanceCooperationCreate',
                    component: ProposalSubtanceCooperationCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/proposal/subtance/cooperation/:id/edit',
                    name: 'ProposalSubtanceCooperationEdit',
                    component: ProposalSubtanceCooperationEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Proposal
                {
                    path: '/submission/cooperation',
                    name: 'ProposalSubmissionCooperationIndex',
                    component: ProposalSubmissionCooperationIndex,
                    meta: {
                        requiresAuth: true
                    }
                },
                //Banner Category
                {
                    path: '/banner/category',
                    name: 'BannerCategoryIndex',
                    component: BannerCategoryIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/banner/category/create',
                    name: 'BannerCategoryCreate',
                    component: BannerCategoryCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/banner/category/:id/edit',
                    name: 'BannerCategoryEdit',
                    component: BannerCategoryEdit,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/banner/list/:id/category',
                    name: 'BannerListCategory',
                    component: BannerListCategory,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/banner/create',
                    name: 'BannerCreate',
                    component: BannerCreate,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/banner/:id/edit',
                    name: 'BannerEdit',
                    component: BannerEdit,
                    meta: {
                        requiresAuth: true
                    }
                },
                //Testimoni
                {
                    path: '/testimoni',
                    name: 'TestimoniIndex',
                    component: TestimoniIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
                {
                    path: '/testimoni/create',
                    name: 'TestimoniCreate',
                    component: TestimoniCreate,
                    meta: {
                        requiresAuth: true,
                    }
                },
                //Dashboard
                {
                    path: '/dashboard',
                    name: 'DashboardIndex',
                    component: DashboardIndex,
                    meta: {
                        requiresAuth: true,
                    }
                },
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
