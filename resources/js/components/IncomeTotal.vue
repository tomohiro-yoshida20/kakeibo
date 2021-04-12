<template>
  <div class="total">
    <h3 v-show="totalMoney != 0">今月の収入合計： {{ totalMoney }} 円</h3>
    <div v-show="totalMoney == 0">
      まだ収入の登録がありません。<br>
      ↓の追加ボックスから登録してください！
    </div>
    <div v-show="totalMoney != 0" class="line"></div>
  </div>
</template>

<script>
export default {
  props: {
    incomes: {
      type: Array,
      // type: Array,
      // default: []
    },
  },
  data() {
    return {
      incomeList: this.incomes,
      // totalMoney: 0
    }
  },
  computed: {
    totalMoney() {
      let total = 0

      // incomeList はオブジェクトのため下記でループ
      Object.keys(this.incomeList).forEach((key) => {
        total += this.incomes[key].money
      })
      // 配列の場合
      // for (let i=0;i<this.incomeList.length; i++) {
      //   total += this.incomeList[i].money
      // }
      return total
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