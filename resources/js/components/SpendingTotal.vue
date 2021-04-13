<template>
  <div class="total">
    <h3 v-show="totalMoney != 0">今月の支出合計： {{ totalMoney }} 円</h3>
    <div v-show="totalMoney == 0">
      まだ支出の登録がありません。<br>
      ↓の追加ボックスから登録してください！
    </div>
    <div v-show="totalMoney != 0" class="line"></div>
  </div>
</template>

<script>
export default {
  props: {
    spendings: {
      type: Array,
      // type: Array,
      // default: []
    },
  },
  data() {
    return {
      spendingList: this.spendings,
      // totalMoney: 0
    }
  },
  computed: {
    totalMoney() {
      let total = 0

      // spendingList はオブジェクトのため下記でループ
      Object.keys(this.spendingList).forEach((key) => {
        total += this.spendings[key].money
      })
      // 配列の場合
      // for (let i=0;i<this.spendingList.length; i++) {
      //   total += this.spendingList[i].money
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