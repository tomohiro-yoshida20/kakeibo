<template>
  <div class="total">
    <h3>当月の貯金額： {{ savingsMoney }} 円</h3>
    <div class="line"></div>
  </div>
</template>

<script>
export default {
  props: {
    incomes: {
      type: Array,
    },
    spendings: {
      type: Array,
    },
  },
  data() {
    return {
      incomeList: this.incomes,
      spendingList: this.spendings,
    }
  },
  computed: {
    savingsMoney() {
      let totalIncome = 0
      let totalSpending = 0
      // incomeList はオブジェクトのため下記でループ
      Object.keys(this.incomeList).forEach((key) => {
        totalIncome += this.incomes[key].money
      })
      // spendingList はオブジェクトのため下記でループ
      Object.keys(this.spendingList).forEach((key) => {
        totalSpending += this.spendings[key].money
      })
      let calc = totalIncome - totalSpending
      if (calc <= 0) {
        calc = 0
      }
      return calc
    }
  }
}
</script>

<style>
  .total {
    position: relative;
    display: inline-block;
    z-index: 10;
  }
  .line {
    position: absolute;
    bottom: 25%;
    background-color: rgba(70, 66, 66, 0.5);
    height: 5px;
    width: 100%;
    z-index: 1;
  }
</style>