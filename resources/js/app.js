import Vue from 'vue'

// Layout
import LPublic from './layout/LPublic'
import LPrivate from './layout/LPrivate'
Vue.component('LPublic', LPublic)
Vue.component('LPrivate', LPrivate)

// Pages
import PFeed from './pages/PFeed'
Vue.component('PLanding', PFeed)

new Vue().$mount('#app')
