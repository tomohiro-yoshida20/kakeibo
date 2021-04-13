// require('./bootstrap');
import './bootstrap'
import Vue from 'vue'
import IncomeTotal from './components/IncomeTotal'
import SpendingTotal from './components/SpendingTotal'

const app = new Vue({
  el: '#app',
  components: {
    IncomeTotal,
    SpendingTotal
  }
})
