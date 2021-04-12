// require('./bootstrap');
import './bootstrap'
import Vue from 'vue'
import IncomeTotal from './components/IncomeTotal'

const app = new Vue({
  el: '#app',
  components: {
    IncomeTotal
  }
})
