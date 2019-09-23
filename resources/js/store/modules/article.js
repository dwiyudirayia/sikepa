const listBreadcrumb = [
    {
        link: [
            {
                id: 1,
                label: 'Test',
                path: '/user'
            }
        ]
    },
    {
        link: [
            {
                id: 1,
                label: 'Test',
                path: '/user'
            }
        ]
    }
];

const article = {
    namespaced: true,
    state : {
        breadcrumbTitle: 'Article',
        breadcrumb: listBreadcrumb
    },
    getters: {
        breadcrumbTitle(state) {
            return state.breadcrumbTitle;
        },
        breadcrumbIndex(state) {
            return state.breadcrumb[0]
        }
    },
    mutations: {

    },
    actions: {

    }
}

export default article;
