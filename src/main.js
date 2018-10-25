import Vue from 'vue'
import Moment from 'moment'
import App from './App.vue'
import VueTabs from 'vue-nav-tabs'
import Header from './Header.vue'
import 'vue-nav-tabs/themes/vue-tabs.css'

Vue.use(VueTabs)
Vue.config.productionTip = false

new Vue({
	render: h => h(App)	
}).$mount('#app')

new Vue({
	render: h => h(Header)	
}).$mount('#app-header')

Vue.filter('formatDate', function(value) { return Moment(String(value)).locale('pt').format('L') })
Vue.filter('formatHour', function(value) { return Moment(String(value)).locale('pt').format('LTS') })