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
import UserEditProfile from './components/User/Edit';

import ConfigAccessRightRoleIndex from './components/User/ConfigAccessRightRoleIndex';
import ConfigAccessRightRoleCreate from './components/User/ConfigAccessRightRoleCreate';
import ConfigAccessRightRoleEdit from './components/User/ConfigAccessRightRoleEdit';
import ConfigRoleUser from './components/User/ConfigRoleUser';
//Admin
import UserAdminIndex from './components/User/Admin/Index';
import UserAdminCreate from './components/User/Admin/Create';
import UserAdminEdit from './components/User/Admin/Edit';

import UserSatkerIndex from './components/User/Satker/Index';
import UserSatkerCreate from './components/User/Satker/Create';
import UserSatkerEdit from './components/User/Satker/Edit';
//EndAdmin

//Background Login
import BackgroundLoginIndex from './components/BackgroundLogin/Index';
import BackgroundLoginEdit from './components/BackgroundLogin/Edit';

//Banner Landing Page
import BannerLandingPageIndex from './components/BannerLandingPage/Index';
import BannerLandingPageEdit from './components/BannerLandingPage/Edit';
import BannerLandingPageChangeConfig from './components/BannerLandingPage/ChangeConfig';

//monev
import MonitoringEvaluasiIndex from './components/Monev/MOU/Index';
import MonitoringP3Create from './components/Monev/MOU/Proposal/P3Create';
import MonitoringSatkerCreate from './components/Monev/MOU/Proposal/SatkerCreate';
import MonevActivitySatkerCreate from './components/Monev/MOU/Proposal/Satker/Create';
import ListMonevActivitySatker from './components/Monev/MOU/Proposal/Satker/List';
import DetailMonevSatker from './components/Monev/MOU/Proposal/Satker/Detail';
import MonevActivityP3Create from './components/Monev/MOU/Proposal/P3/Create';
import ListMonevActivityGuest from './components/Monev/MOU/Proposal/P3/List';
import DetailMonevGuest from './components/Monev/MOU/Proposal/P3/Detail';
import ResultMonevActivityGuestEdit from './components/Monev/MOU/Proposal/P3/Edit';
import ReportMonevGuest from './components/Monev/MOU/Report/P3/Create';
import ReportMonev from './components/Monev/MOU/Report/Satker/Create';

import AdendumMonitoringEvaluasiIndex from './components/Monev/Adendum/Index';
import AdendumMonitoringP3Create from './components/Monev/Adendum/Proposal/P3Create';
import AdendumMonitoringSatkerCreate from './components/Monev/Adendum/Proposal/SatkerCreate';
import AdendumMonevActivitySatkerCreate from './components/Monev/Adendum/Proposal/Satker/Create';
import AdendumListMonevActivitySatker from './components/Monev/Adendum/Proposal/Satker/List';
import AdendumDetailMonevSatker from './components/Monev/Adendum/Proposal/Satker/Detail';
import AdendumMonevActivityP3Create from './components/Monev/Adendum/Proposal/P3/Create';
import AdendumListMonevActivityGuest from './components/Monev/Adendum/Proposal/P3/List';
import AdendumDetailMonevGuest from './components/Monev/Adendum/Proposal/P3/Detail';
import AdendumResultMonevActivityGuestEdit from './components/Monev/Adendum/Proposal/P3/Edit';
import AdendumReportMonevGuest from './components/Monev/Adendum/Report/P3/Create';
import AdendumReportMonev from './components/Monev/Adendum/Report/Satker/Create';

import ExtensionMonitoringEvaluasiIndex from './components/Monev/Extension/Index';
import ExtensionMonitoringP3Create from './components/Monev/Extension/Proposal/P3Create';
import ExtensionMonitoringSatkerCreate from './components/Monev/Extension/Proposal/SatkerCreate';
import ExtensionMonevActivitySatkerCreate from './components/Monev/Extension/Proposal/Satker/Create';
import ExtensionListMonevActivitySatker from './components/Monev/Extension/Proposal/Satker/List';
import ExtensionDetailMonevSatker from './components/Monev/Extension/Proposal/Satker/Detail';
import ExtensionMonevActivityP3Create from './components/Monev/Extension/Proposal/P3/Create';
import ExtensionListMonevActivityGuest from './components/Monev/Extension/Proposal/P3/List';
import ExtensionDetailMonevGuest from './components/Monev/Extension/Proposal/P3/Detail';
import ExtensionResultMonevActivityGuestEdit from './components/Monev/Extension/Proposal/P3/Edit';
import ExtensionReportMonevGuest from './components/Monev/Extension/Report/P3/Create';
import ExtensionReportMonev from './components/Monev/Extension/Report/Satker/Create';
// import MonitoringEvaluasiCreate from './components/Monev/Create';
// import MonitoringEvaluasiEdit from './components/Monev/Edit';
// import MonevActivityCreate from './components/Monev/Activity/Create';
// import MonevActivityDetail from './components/Monev/Detail';
// import ListMonevActivity from './components/Monev/Activity/List';
// import MonitoringEvaluasiEditFile from './components/Monev/EditFile';
//end monev
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
// import ProposalCategoryIndex from './components/Proposal/Category/Index';
// import ProposalCategoryCreate from './components/Proposal/Category/Create';
// import ProposalCategoryEdit from './components/Proposal/Category/Edit';

// import ProposalCooperationTargetIndex from './components/Proposal/CooperationTarget/Index';
// import ProposalCooperationTargetCreate from './components/Proposal/CooperationTarget/Create';
// import ProposalCooperationTargetEdit from './components/Proposal/CooperationTarget/Edit';

// import ProposalSubmissionTypeIndex from './components/Proposal/SubmissionType/Index';
// import ProposalSubmissionTypeCreate from './components/Proposal/SubmissionType/Create';
// import ProposalSubmissionTypeEdit from './components/Proposal/SubmissionType/Edit';

// import ProposalTypeOfCooperationIndex from './components/Proposal/TypeOfCooperation/Index';
// import ProposalTypeOfCooperationCreate from './components/Proposal/TypeOfCooperation/Create';
// import ProposalTypeOfCooperationEdit from './components/Proposal/TypeOfCooperation/Edit';

import ProposalTypeOfCooperationOneDerivativeListOne from './components/Proposal/TypeOfCooperation/TypeOfCooperationOneDerivative/ListTypeOfCooperationOne';
import ProposalTypeOfCooperationOneDerivativeCreate from './components/Proposal/TypeOfCooperation/TypeOfCooperationOneDerivative/Create';
import ProposalTypeOfCooperationOneDerivativeEdit from './components/Proposal/TypeOfCooperation/TypeOfCooperationOneDerivative/Edit';

import ProposalTypeOfCooperationTwoDerivativeListTwo from './components/Proposal/TypeOfCooperation/TypeOfCooperationTwoDerivative/ListTypeOfCooperationTwo';
import ProposalTypeOfCooperationTwoDerivativeCreate from './components/Proposal/TypeOfCooperation/TypeOfCooperationTwoDerivative/Create';
import ProposalTypeOfCooperationTwoDerivativeEdit from './components/Proposal/TypeOfCooperation/TypeOfCooperationTwoDerivative/Edit';

// import ProposalSubtanceCooperationIndex from './components/Proposal/SubtanceCooperation/Index';
// import ProposalSubtanceCooperationCreate from './components/Proposal/SubtanceCooperation/Create';
// import ProposalSubtanceCooperationEdit from './components/Proposal/SubtanceCooperation/Edit';

import ProposalSubmissionCooperationCreate from './components/Proposal/SubmissionCooperation/Create';
//MOU
import MOUProposalSubmissionCooperationIndex from './components/Proposal/SubmissionCooperation/MOU/Index';
import MOUProposalSubmissionCooperationDetail from './components/Proposal/SubmissionCooperation/MOU/Detail';
import MOUProposalSubmissionCooperationYourDetail from './components/Proposal/SubmissionCooperation/MOU/YourDetail';
import MOUProposalSubmissionCooperationYourDetailGuestPreview from './components/Proposal/SubmissionCooperation/Guest/MOU/YourDetailPreview';
import MOUProposalSubmissionCooperationYourDetailPreview from './components/Proposal/SubmissionCooperation/MOU/YourDetailPreview';
import MOUProposalSubmissionCooperationApprove from './components/Proposal/SubmissionCooperation/MOU/Approve';
import MOUProposalSubmissionCooperationReject from './components/Proposal/SubmissionCooperation/MOU/Reject';
import MOUProposalSubmissionCooperationDetailGuest from './components/Proposal/SubmissionCooperation/Guest/MOU/Detail';

//Adendum
import AdendumProposalSubmissionCooperationIndex from './components/Proposal/SubmissionCooperation/Adendum/Index';
import AdendumProposalSubmissionCooperationDetail from './components/Proposal/SubmissionCooperation/Adendum/Detail';
import AdendumProposalSubmissionCooperationYourDetail from './components/Proposal/SubmissionCooperation/Adendum/YourDetail';
import AdendumProposalSubmissionCooperationYourDetailGuestPreview from './components/Proposal/SubmissionCooperation/Guest/Adendum/YourDetailPreview';
import AdendumProposalSubmissionCooperationYourDetailPreview from './components/Proposal/SubmissionCooperation/Adendum/YourDetailPreview';
import AdendumProposalSubmissionCooperationApprove from './components/Proposal/SubmissionCooperation/Adendum/Approve';
import AdendumProposalSubmissionCooperationReject from './components/Proposal/SubmissionCooperation/Adendum/Reject';
import AdendumProposalSubmissionCooperationDetailGuest from './components/Proposal/SubmissionCooperation/Guest/Adendum/Detail';

//Perpanjangan
import ExtensionProposalSubmissionCooperationIndex from './components/Proposal/SubmissionCooperation/Extension/Index';
import ExtensionProposalSubmissionCooperationDetail from './components/Proposal/SubmissionCooperation/Extension/Detail';
import ExtensionProposalSubmissionCooperationYourDetail from './components/Proposal/SubmissionCooperation/Extension/YourDetail';
import ExtensionProposalSubmissionCooperationYourDetailGuestPreview from './components/Proposal/SubmissionCooperation/Guest/Extension/YourDetailPreview';
import ExtensionProposalSubmissionCooperationYourDetailPreview from './components/Proposal/SubmissionCooperation/Extension/YourDetailPreview';
import ExtensionProposalSubmissionCooperationApprove from './components/Proposal/SubmissionCooperation/Extension/Approve';
import ExtensionProposalSubmissionCooperationReject from './components/Proposal/SubmissionCooperation/Extension/Reject';
import ExtensionProposalSubmissionCooperationDetailGuest from './components/Proposal/SubmissionCooperation/Guest/Extension/Detail';

// import PKSProposalSubmissionCooperationIndex from './components/Proposal/SubmissionCooperation/PKS/Index';
// import PKSProposalSubmissionCooperationDetail from './components/Proposal/SubmissionCooperation/PKS/Detail';
// import PKSProposalSubmissionCooperationYourDetail from './components/Proposal/SubmissionCooperation/PKS/YourDetail';
// import PKSProposalSubmissionCooperationYourDetailPreview from './components/Proposal/SubmissionCooperation/PKS/YourDetailPreview';
// import PKSProposalSubmissionCooperationApprove from './components/Proposal/SubmissionCooperation/PKS/Approve';
// import PKSProposalSubmissionCooperationReject from './components/Proposal/SubmissionCooperation/PKS/Reject';


// import PKSProposalSubmissionCooperationDetaiGuest from './components/Proposal/SubmissionCooperation/Guest/PKS/Detail';
// --- End Proposal --- //

// --- Banner --- //
//Category
// import BannerCategoryIndex from './components/Banner/Category/Index';
// import BannerCategoryCreate from './components/Banner/Category/Create';
// import BannerCategoryEdit from './components/Banner/Category/Edit';

//Banner
// import BannerListCategory from './components/Banner/BannerListCategory';
// import BannerCreate from './components/Banner/Create';
// import BannerEdit from './components/Banner/Edit';
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
import TestimoniEdit from './components/Testimoni/Edit';
// EndTestimoni

//Informasi Deputi

import DeputiInformationIndex from './components/DeputiInformation/Index';
import DeputiInformationEdit from './components/DeputiInformation/Edit';
import DeputiInformationCreate from './components/DeputiInformation/Create';
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
                //Konfigurasi
                {
                    path: '/config/access/rights',
                    name: 'ConfigAccessRightRoleIndex',
                    component: ConfigAccessRightRoleIndex,
                    meta: {
                        requiresAuth: true
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/config/access/right/role/create',
                    name: 'ConfigAccessRightRoleCreate',
                    component: ConfigAccessRightRoleCreate,
                    meta: {
                        requiresAuth: true
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/config/access/right/role/:id/edit',
                    name: 'ConfigAccessRightRoleEdit',
                    component: ConfigAccessRightRoleEdit,
                    meta: {
                        requiresAuth: true
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/config/role/user',
                    name: 'ConfigRoleUser',
                    component: ConfigRoleUser,
                    meta: {
                        requiresAuth: true
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
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
                    path: '/user/edit/profile',
                    name: 'UserEditProfile',
                    component: UserEditProfile,
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
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/user/admin/create',
                    name: 'UserAdminCreate',
                    component: UserAdminCreate,
                    meta: {
                        requiresAuth: true
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/user/admin/:id/edit',
                    name: 'UserAdminEdit',
                    component: UserAdminEdit,
                    meta: {
                        requiresAuth: true
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                //satker
                {
                    path: '/user/satker',
                    name: 'UserSatkerIndex',
                    component: UserSatkerIndex,
                    meta: {
                        requiresAuth: true
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/user/satker/create',
                    name: 'UserSatkerCreate',
                    component: UserSatkerCreate,
                    meta: {
                        requiresAuth: true
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/user/satker/:id/edit',
                    name: 'UserSatkerEdit',
                    component: UserSatkerEdit,
                    meta: {
                        requiresAuth: true
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                //Section Article
                {
                    path: '/section/article',
                    name: 'SectionArticleIndex',
                    component: SectionArticleIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/section/article/create',
                    name: 'SectionArticleCreate',
                    component: SectionArticleCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/section/article/:id/edit',
                    name: 'SectionArticleEdit',
                    component: SectionArticleEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                //Category Article
                {
                    path: '/list/:id/category/article',
                    name: 'ListSectionCategoryArticle',
                    component: ListSectionCategoryArticle,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/category/article/create',
                    name: 'CategoryArticleCreate',
                    component: CategoryArticleCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/category/article/:id/edit',
                    name: 'CategoryArticleEdit',
                    component: CategoryArticleEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                //Article
                {
                    path: '/category/:id/article',
                    name: 'ListCategoryArticle',
                    component: ListCategoryArticle,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/article/create',
                    name: 'ArticleCreate',
                    component: ArticleCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/article/:id/edit',
                    name: 'ArticleEdit',
                    component: ArticleEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                //Section Page
                {
                    path: '/section/page',
                    name: 'SectionPageIndex',
                    component: SectionPageIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/section/page/create',
                    name: 'SectionPageCreate',
                    component: SectionPageCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/section/page/:id/edit',
                    name: 'SectionPageEdit',
                    component: SectionPageEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                // Category page
                {
                    path: '/list/:id/category/page',
                    name: 'ListSectionCategoryPage',
                    component: ListSectionCategoryPage,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/category/page/create',
                    name: 'CategoryPageCreate',
                    component: CategoryPageCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/category/page/:id/edit',
                    name: 'CategoryPageEdit',
                    component: CategoryPageEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                // Page
                {
                    path: '/category/:id/page',
                    name: 'ListCategoryPage',
                    component: ListCategoryPage,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/page/create',
                    name: 'PageCreate',
                    component: PageCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/page/:id/edit',
                    name: 'PageEdit',
                    component: PageEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                //Faq
                {
                    path: '/faq',
                    name: 'FaqIndex',
                    component: FaqIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/faq/create',
                    name: 'FaqCreate',
                    component: FaqCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/faq/:id/edit',
                    name: 'FaqEdit',
                    component: FaqEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                //Agency
                {
                    path: '/proposal/agency',
                    name: 'AgencyIndex',
                    component: AgencyIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/proposal/agency/create',
                    name: 'AgencyCreate',
                    component: AgencyCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/proposal/agency/:id/edit',
                    name: 'AgencyEdit',
                    component: AgencyEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                //Proposal Category
                // {
                //     path: '/proposal/category',
                //     name: 'ProposalCategoryIndex',
                //     component: ProposalCategoryIndex,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/proposal/category/create',
                //     name: 'ProposalCategoryCreate',
                //     component: ProposalCategoryCreate,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/proposal/category/:id/edit',
                //     name: 'ProposalCategoryEdit',
                //     component: ProposalCategoryEdit,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                //Proposal Cooperation Target
                // {
                //     path: '/proposal/cooperation/target',
                //     name: 'ProposalCooperationTargetIndex',
                //     component: ProposalCooperationTargetIndex,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/proposal/cooperation/target/create',
                //     name: 'ProposalCooperationTargetCreate',
                //     component: ProposalCooperationTargetCreate,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/proposal/cooperation/target/:id/edit',
                //     name: 'ProposalCooperationTargetEdit',
                //     component: ProposalCooperationTargetEdit,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // Proposal Submission Type
                // {
                //     path: '/proposal/submission/type',
                //     name: 'ProposalSubmissionTypeIndex',
                //     component: ProposalSubmissionTypeIndex,
                //     meta: {
                //         requiresAuth: true,
                //     },
                //     beforeEnter: (to, from, next) => {
                //         const permission = store.state.user.authenticated.permission;

                //         let filterPermission = permission.filter(value => value === 'Admin');

                //         if(filterPermission.length == 0) {
                //             return true;
                //         } else {
                //             next();
                //         }
                //     },
                // },
                // {
                //     path: '/proposal/submission/type/create',
                //     name: 'ProposalSubmissionTypeCreate',
                //     component: ProposalSubmissionTypeCreate,
                //     meta: {
                //         requiresAuth: true,
                //     },
                //     beforeEnter: (to, from, next) => {
                //         const permission = store.state.user.authenticated.permission;

                //         let filterPermission = permission.filter(value => value === 'Admin');

                //         if(filterPermission.length == 0) {
                //             return true;
                //         } else {
                //             next();
                //         }
                //     },
                // },
                // {
                //     path: '/proposal/submission/type/:id/edit',
                //     name: 'ProposalSubmissionTypeEdit',
                //     component: ProposalSubmissionTypeEdit,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                //Proposal Type of Cooperation
                // {
                //     path: '/proposal/typeof/cooperation/:id/list',
                //     name: 'ProposalTypeOfCooperationIndex',
                //     component: ProposalTypeOfCooperationIndex,
                //     meta: {
                //         requiresAuth: true,
                //     },
                //     beforeEnter: (to, from, next) => {
                //         const permission = store.state.user.authenticated.permission;

                //         let filterPermission = permission.filter(value => value === 'Admin');

                //         if(filterPermission.length == 0) {
                //             return true;
                //         } else {
                //             next();
                //         }
                //     },
                // },
                // {
                //     path: '/proposal/typeof/cooperation/create',
                //     name: 'ProposalTypeOfCooperationCreate',
                //     component: ProposalTypeOfCooperationCreate,
                //     meta: {
                //         requiresAuth: true,
                //     },
                //     beforeEnter: (to, from, next) => {
                //         const permission = store.state.user.authenticated.permission;

                //         let filterPermission = permission.filter(value => value === 'Admin');

                //         if(filterPermission.length == 0) {
                //             return true;
                //         } else {
                //             next();
                //         }
                //     },
                // },
                // {
                //     path: '/proposal/typeof/cooperation/:id/edit',
                //     name: 'ProposalTypeOfCooperationEdit',
                //     component: ProposalTypeOfCooperationEdit,
                //     props: true,
                //     meta: {
                //         requiresAuth: true,
                //     },
                //     beforeEnter: (to, from, next) => {
                //         const permission = store.state.user.authenticated.permission;

                //         let filterPermission = permission.filter(value => value === 'Admin');

                //         if(filterPermission.length == 0) {
                //             return true;
                //         } else {
                //             next();
                //         }
                //     },
                // },
                //TypeOfCooperationOneDerivative
                {
                    path: '/proposal/typeof/cooperation/list/one',
                    name: 'ProposalTypeOfCooperationOneDerivativeListOne',
                    component: ProposalTypeOfCooperationOneDerivativeListOne,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/proposal/typeof/cooperation/one/derivative/create',
                    name: 'ProposalTypeOfCooperationOneDerivativeCreate',
                    component: ProposalTypeOfCooperationOneDerivativeCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/proposal/typeof/cooperation/one/derivative/:id/edit',
                    name: 'ProposalTypeOfCooperationOneDerivativeEdit',
                    component: ProposalTypeOfCooperationOneDerivativeEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                //TypeOfCooperationTwoDerivative
                {
                    path: '/proposal/typeof/cooperation/list/:id/two',
                    name: 'ProposalTypeOfCooperationTwoDerivativeListTwo',
                    component: ProposalTypeOfCooperationTwoDerivativeListTwo,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/proposal/typeof/cooperation/two/derivative/create',
                    name: 'ProposalTypeOfCooperationTwoDerivativeCreate',
                    component: ProposalTypeOfCooperationTwoDerivativeCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/proposal/typeof/cooperation/two/derivative/:id/edit',
                    name: 'ProposalTypeOfCooperationTwoDerivativeEdit',
                    component: ProposalTypeOfCooperationTwoDerivativeEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                //Guest
                {
                    path: '/mou/submission/cooperation/:id/detail/guest',
                    name: 'MOUProposalSubmissionCooperationDetailGuest',
                    component: MOUProposalSubmissionCooperationDetailGuest,
                    meta: {
                        requiresAuth: true
                    }
                },
                // {
                //     path: '/pks/submission/cooperation/:id/detail/guest',
                //     name: 'PKSProposalSubmissionCooperationDetailGuest',
                //     component: PKSProposalSubmissionCooperationDetaiGuest,
                //     meta:{
                //         requiresAuth: true
                //     }
                // },
                //Proposal Subtance Cooperation
                // {
                //     path: '/proposal/subtance/cooperation',
                //     name: 'ProposalSubtanceCooperationIndex',
                //     component: ProposalSubtanceCooperationIndex,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/proposal/subtance/cooperation/create',
                //     name: 'ProposalSubtanceCooperationCreate',
                //     component: ProposalSubtanceCooperationCreate,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/proposal/subtance/cooperation/:id/edit',
                //     name: 'ProposalSubtanceCooperationEdit',
                //     component: ProposalSubtanceCooperationEdit,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                //Proposal
                {
                    path: '/mou/submission/cooperation',
                    name: 'MOUProposalSubmissionCooperationIndex',
                    component: MOUProposalSubmissionCooperationIndex,
                    meta: {
                        requiresAuth: true
                    },
                },
                {
                    path: '/mou/submission/cooperation/approve',
                    name: 'MOUProposalSubmissionCooperationApprove',
                    component: MOUProposalSubmissionCooperationApprove,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/mou/submission/cooperation/reject',
                    name: 'MOUProposalSubmissionCooperationReject',
                    component: MOUProposalSubmissionCooperationReject,
                    meta: {
                        requiresAuth: true
                    }
                },
                //
                //
                {
                    path: '/submission/cooperation/create',
                    name: 'ProposalSubmissionCooperationCreate',
                    component: ProposalSubmissionCooperationCreate,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/mou/submission/cooperation/:id/detail',
                    name: 'MOUProposalSubmissionCooperationDetail',
                    component: MOUProposalSubmissionCooperationDetail,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/mou/submission/cooperation/:id/your/detail',
                    name: 'MOUProposalSubmissionCooperationYourDetail',
                    component: MOUProposalSubmissionCooperationYourDetail,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/mou/submission/cooperation/:id/your/detail/preview',
                    name: 'MOUProposalSubmissionCooperationYourDetailPreview',
                    component: MOUProposalSubmissionCooperationYourDetailPreview,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/mou/submission/cooperation/:id/your/detail/guest/preview',
                    name: 'MOUProposalSubmissionCooperationYourDetailGuestPreview',
                    component: MOUProposalSubmissionCooperationYourDetailGuestPreview,
                    meta: {
                        requiresAuth: true
                    }
                },
                //PKS
                // {
                //     path: '/pks/submission/cooperation',
                //     name: 'PKSProposalSubmissionCooperationIndex',
                //     component: PKSProposalSubmissionCooperationIndex,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
                // {
                //     path: '/pks/submission/cooperation/approve',
                //     name: 'PKSProposalSubmissionCooperationApprove',
                //     component: PKSProposalSubmissionCooperationApprove,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
                // {
                //     path: '/pks/submission/cooperation/reject',
                //     name: 'PKSProposalSubmissionCooperationReject',
                //     component: PKSProposalSubmissionCooperationReject,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
                // {
                //     path: '/pks/submission/cooperation/:id/detail',
                //     name: 'PKSProposalSubmissionCooperationDetail',
                //     component: PKSProposalSubmissionCooperationDetail,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
                // {
                //     path: '/pks/submission/cooperation/:id/your/detail',
                //     name: 'PKSProposalSubmissionCooperationYourDetail',
                //     component: PKSProposalSubmissionCooperationYourDetail,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
                // {
                //     path: '/pks/submission/cooperation/:id/your/detail/preview',
                //     name: 'PKSProposalSubmissionCooperationYourDetailPreview',
                //     component: PKSProposalSubmissionCooperationYourDetailPreview,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
                //Banner Category
                {
                    path: '/background/login',
                    name: 'BackgroundLoginIndex',
                    component: BackgroundLoginIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/background/login/:id/edit',
                    name: 'BackgroundLoginEdit',
                    component: BackgroundLoginEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/article/banner',
                    name: 'BannerLandingPageIndex',
                    component: BannerLandingPageIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/article/banner/:id/edit',
                    name: 'BannerLandingPageEdit',
                    component: BannerLandingPageEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/article/banner/change/config',
                    name: 'BannerLandingPageChangeConfig',
                    component: BannerLandingPageChangeConfig,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                // {
                //     path: '/banner/category',
                //     name: 'BannerCategoryIndex',
                //     component: BannerCategoryIndex,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/banner/category/create',
                //     name: 'BannerCategoryCreate',
                //     component: BannerCategoryCreate,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/banner/category/:id/edit',
                //     name: 'BannerCategoryEdit',
                //     component: BannerCategoryEdit,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/banner/list/:id/category',
                //     name: 'BannerListCategory',
                //     component: BannerListCategory,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
                // {
                //     path: '/banner/create',
                //     name: 'BannerCreate',
                //     component: BannerCreate,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
                // {
                //     path: '/banner/:id/edit',
                //     name: 'BannerEdit',
                //     component: BannerEdit,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
                //Deputi Information
                {
                    path: '/deputy/information',
                    name: 'DeputiInformationIndex',
                    component: DeputiInformationIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/deputy/information/:id/edit',
                    name: 'DeputiInformationEdit',
                    component: DeputiInformationEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/deputy/information/create',
                    name: 'DeputiInformationCreate',
                    component: DeputiInformationCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                //Testimoni
                {
                    path: '/testimoni',
                    name: 'TestimoniIndex',
                    component: TestimoniIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/testimoni/create',
                    name: 'TestimoniCreate',
                    component: TestimoniCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/testimoni/:id/edit',
                    name: 'TestimoniEdit',
                    component: TestimoniEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Admin');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                //Monev
                {
                    path: '/monev/mou',
                    name: 'MonitoringEvaluasiIndex',
                    component: MonitoringEvaluasiIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/p3/create',
                    name: 'MonitoringP3Create',
                    component: MonitoringP3Create,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/satker/create',
                    name: 'MonitoringSatkerCreate',
                    component: MonitoringSatkerCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/activity/:id/guest/create',
                    name: 'MonevActivityP3Create',
                    component: MonevActivityP3Create,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/activity/:id/satker/create',
                    name: 'MonevActivitySatkerCreate',
                    component: MonevActivitySatkerCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/activity/:id/satker/list',
                    name: 'ListMonevActivitySatker',
                    component: ListMonevActivitySatker,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/activity/:id/guest/list',
                    name: 'ListMonevActivityGuest',
                    component: ListMonevActivityGuest,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/detail/:id/guest',
                    name: 'DetailMonevGuest',
                    component: DetailMonevGuest,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/detail/:id/satker',
                    name: 'DetailMonevSatker',
                    component: DetailMonevSatker,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/detail/:id/guest/edit',
                    name: 'ResultMonevActivityGuestEdit',
                    component: ResultMonevActivityGuestEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/report/:id/guest/create',
                    name: 'ReportMonevGuest',
                    component: ReportMonevGuest,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/mou/report/:id/create',
                    name: 'ReportMonev',
                    component: ReportMonev,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                //Monev Adendum
                {
                    path: '/monev/adendum',
                    name: 'AdendumMonitoringEvaluasiIndex',
                    component: AdendumMonitoringEvaluasiIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/p3/create',
                    name: 'AdendumMonitoringP3Create',
                    component: AdendumMonitoringP3Create,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/satker/create',
                    name: 'AdendumMonitoringSatkerCreate',
                    component: AdendumMonitoringSatkerCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/activity/:id/guest/create',
                    name: 'AdendumMonevActivityP3Create',
                    component: AdendumMonevActivityP3Create,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/activity/:id/satker/create',
                    name: 'AdendumMonevActivitySatkerCreate',
                    component: AdendumMonevActivitySatkerCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/activity/:id/satker/list',
                    name: 'AdendumListMonevActivitySatker',
                    component: AdendumListMonevActivitySatker,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/activity/:id/guest/list',
                    name: 'AdendumListMonevActivityGuest',
                    component: AdendumListMonevActivityGuest,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/detail/:id/guest',
                    name: 'AdendumDetailMonevGuest',
                    component: AdendumDetailMonevGuest,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/detail/:id/satker',
                    name: 'AdendumDetailMonevSatker',
                    component: AdendumDetailMonevSatker,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/detail/:id/guest/edit',
                    name: 'AdendumResultMonevActivityGuestEdit',
                    component: AdendumResultMonevActivityGuestEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/report/:id/guest/create',
                    name: 'AdendumReportMonevGuest',
                    component: AdendumReportMonevGuest,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/adendum/report/:id/create',
                    name: 'AdendumReportMonev',
                    component: AdendumReportMonev,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                //Monev Extension
                {
                    path: '/monev/extension/detail/:id/guest/edit',
                    name: 'ExtensionResultMonevActivityGuestEdit',
                    component: ExtensionResultMonevActivityGuestEdit,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension',
                    name: 'ExtensionMonitoringEvaluasiIndex',
                    component: ExtensionMonitoringEvaluasiIndex,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/p3/create',
                    name: 'ExtensionMonitoringP3Create',
                    component: ExtensionMonitoringP3Create,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/satker/create',
                    name: 'ExtensionMonitoringSatkerCreate',
                    component: ExtensionMonitoringSatkerCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/activity/:id/guest/create',
                    name: 'ExtensionMonevActivityP3Create',
                    component: ExtensionMonevActivityP3Create,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/activity/:id/satker/create',
                    name: 'ExtensionMonevActivitySatkerCreate',
                    component: ExtensionMonevActivitySatkerCreate,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/activity/:id/satker/list',
                    name: 'ExtensionListMonevActivitySatker',
                    component: ExtensionListMonevActivitySatker,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/activity/:id/guest/list',
                    name: 'ExtensionListMonevActivityGuest',
                    component: ExtensionListMonevActivityGuest,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/detail/:id/guest',
                    name: 'ExtensionDetailMonevGuest',
                    component: ExtensionDetailMonevGuest,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/detail/:id/satker',
                    name: 'ExtensionDetailMonevSatker',
                    component: ExtensionDetailMonevSatker,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/report/:id/guest/create',
                    name: 'ExtensionReportMonevGuest',
                    component: ExtensionReportMonevGuest,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/monev/extension/report/:id/create',
                    name: 'ExtensionReportMonev',
                    component: ExtensionReportMonev,
                    meta: {
                        requiresAuth: true,
                    },
                    beforeEnter: (to, from, next) => {
                        const permission = store.state.user.authenticated.permission;

                        let filterPermission = permission.filter(value => value === 'Monev');

                        if(filterPermission.length == 0) {
                            return true;
                        } else {
                            next();
                        }
                    },
                },
                {
                    path: '/adendum/submission/cooperation/:id/detail/guest',
                    name: 'AdendumProposalSubmissionCooperationDetailGuest',
                    component: AdendumProposalSubmissionCooperationDetailGuest,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/adendum/submission/cooperation/:id/detail',
                    name: 'AdendumProposalSubmissionCooperationDetail',
                    component: AdendumProposalSubmissionCooperationDetail,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/adendum/submission/cooperation',
                    name: 'AdendumProposalSubmissionCooperationIndex',
                    component: AdendumProposalSubmissionCooperationIndex,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/adendum/submission/cooperation/approve',
                    name: 'AdendumProposalSubmissionCooperationApprove',
                    component: AdendumProposalSubmissionCooperationApprove,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/adendum/submission/cooperation/reject',
                    name: 'AdendumProposalSubmissionCooperationReject',
                    component: AdendumProposalSubmissionCooperationReject,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/adendum/submission/cooperation/:id/your/detail',
                    name: 'AdendumProposalSubmissionCooperationYourDetail',
                    component: AdendumProposalSubmissionCooperationYourDetail,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/adendum/submission/cooperation/:id/your/detail/preview',
                    name: 'AdendumProposalSubmissionCooperationYourDetailPreview',
                    component: AdendumProposalSubmissionCooperationYourDetailPreview,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/adendum/submission/cooperation/:id/your/detail/guest/preview',
                    name: 'AdendumProposalSubmissionCooperationYourDetailGuestPreview',
                    component: AdendumProposalSubmissionCooperationYourDetailGuestPreview,
                    meta: {
                        requiresAuth: true
                    }
                },
                //
                {
                    path: '/extension/submission/cooperation/:id/detail/guest',
                    name: 'ExtensionProposalSubmissionCooperationDetailGuest',
                    component: ExtensionProposalSubmissionCooperationDetailGuest,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/extension/submission/cooperation/:id/detail',
                    name: 'ExtensionProposalSubmissionCooperationDetail',
                    component: ExtensionProposalSubmissionCooperationDetail,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/extension/submission/cooperation',
                    name: 'ExtensionProposalSubmissionCooperationIndex',
                    component: ExtensionProposalSubmissionCooperationIndex,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/extension/submission/cooperation/approve',
                    name: 'ExtensionProposalSubmissionCooperationApprove',
                    component: ExtensionProposalSubmissionCooperationApprove,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/extension/submission/cooperation/reject',
                    name: 'ExtensionProposalSubmissionCooperationReject',
                    component: ExtensionProposalSubmissionCooperationReject,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/extension/submission/cooperation/:id/your/detail',
                    name: 'ExtensionProposalSubmissionCooperationYourDetail',
                    component: ExtensionProposalSubmissionCooperationYourDetail,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/extension/submission/cooperation/:id/your/detail/preview',
                    name: 'ExtensionProposalSubmissionCooperationYourDetailPreview',
                    component: ExtensionProposalSubmissionCooperationYourDetailPreview,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: '/extension/submission/cooperation/:id/your/detail/guest/preview',
                    name: 'ExtensionProposalSubmissionCooperationYourDetailGuestPreview',
                    component: ExtensionProposalSubmissionCooperationYourDetailGuestPreview,
                    meta: {
                        requiresAuth: true
                    }
                },
                // {
                //     path: '/monev/create',
                //     name: 'MonitoringEvaluasiCreate',
                //     component: MonitoringEvaluasiCreate,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/monev/:id/edit',
                //     name: 'MonitoringEvaluasiEdit',
                //     component: MonitoringEvaluasiEdit,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/monev/:id/edit/file',
                //     name: 'MonitoringEvaluasiEditFile',
                //     component: MonitoringEvaluasiEditFile,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/monev/activity/:id/create',
                //     name: 'MonevActivityCreate',
                //     component: MonevActivityCreate,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/monev/activity/:id/detail',
                //     name: 'MonevActivityDetail',
                //     component: MonevActivityDetail,
                //     meta: {
                //         requiresAuth: true,
                //     }
                // },
                // {
                //     path: '/monev/list/activity/:id',
                //     name: 'ListMonevActivity',
                //     component: ListMonevActivity,
                //     meta: {
                //         requiresAuth: true
                //     }
                // },
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

