import Vue from 'vue'

// Layout
import LHeader from './layout/LHeader'
import LPublic from './layout/LPublic'
Vue.component('LHeader', LHeader)
Vue.component('LPublic', LPublic)

// Pages
import PFeed from './pages/PFeed'
Vue.component('PLanding', PFeed)

new Vue().$mount('#app')
