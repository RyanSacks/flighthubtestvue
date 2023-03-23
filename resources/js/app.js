import Vue from 'vue';
Vue.config.devtools = true;
import App from './App.vue';

import router from './router';

new Vue({
    el: '#app',
    router,
    render: h => h(App)
});

// gtag('set', 'page', router.currentRoute.path);
// gtag('send', 'pageview');
//
// router.afterEach(( to, from ) => {
//     gtag('set', 'page', to.path);
//     gtag('send', 'pageview');
// });
