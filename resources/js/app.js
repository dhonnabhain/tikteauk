import Vue from 'vue'

// Pages
import PLanding from './pages/PLanding'

// Layout
import LHeader from './layout/LHeader'

Vue.component('PLanding', PLanding)
Vue.component('LHeader', LHeader)

new Vue().$mount('#app')
