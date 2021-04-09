// require('./bootstrap');
import './bootstrap'
import Vue from 'vue'
// import ArticleLike from './components/ArticleLike'
import IncomeList from './components/IncomeList'

const app = new Vue({
  el: '#app',
  components: {
    // ArticleLike,
    IncomeList,
  }
})
