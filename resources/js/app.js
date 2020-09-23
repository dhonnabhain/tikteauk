import Vue from 'vue'

// Pages
import PLanding from './pages/PLanding'

// Layout
import LHeader from './layout/LHeader'
import LPublic from './layout/LPublic'

Vue.component('PLanding', PLanding)
Vue.component('LHeader', LHeader)
Vue.component('LPublic', LPublic)

new Vue().$mount('#app')
