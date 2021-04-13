<!-- 貯金 -->
<div class="card my-3">
  <div class="card-body">
    <h2 class="card-title peach-gradient">
      <i class="fas fa-hand-holding-usd fa-1x"></i>
      貯金
    </h2>
    <br>
    <savings-at-month
    :incomes="{{ $incomes }}"
    :spendings="{{ $spendings }}"
    ></savings-at-month>
  </div>
</div>