import Vue from 'vue';

// Add vue filters here. So this filters can be accessed globally

Vue.filter('currency', value => {
    console.log(value);
    if (!value) return 'Rp0';

    return `Rp ${value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
});
