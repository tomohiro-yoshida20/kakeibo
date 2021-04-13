// require('./bootstrap');
import './bootstrap'
import Vue from 'vue'
import IncomeTotal from './components/IncomeTotal'
import SpendingTotal from './components/SpendingTotal'
import SavingsAtMonth from './components/SavingsAtMonth'

const app = new Vue({
  el: '#app',
  components: {
    IncomeTotal,
    SpendingTotal,
    SavingsAtMonth
  }
})

const change_btn = document.getElementById('change_btn');
const income_field = document.getElementById('income_field');
const spending_field = document.getElementById('spending_field');
change_btn.addEventListener('click', () => {
  income_field.classList.toggle('none');
  spending_field.classList.toggle('none');
})
