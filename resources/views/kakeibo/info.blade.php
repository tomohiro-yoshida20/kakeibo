<div class="card mt-3">
  <div class="card-body">
    <h2 class="card-title">
      家計簿タイトル
    </h2>
    <div class="card-text">
      【当サービスについて】
      <p>家計簿サービスです</p>
      <p>指定の月毎に収入及び支出を登録できます</p>
      <p>前月との差分チェックができます</p>
      <p>↓ ボタンからユーザー登録して今すぐ家計簿開始</p>
    </div>
    <form id="to_register" action="{{ route('register') }}"></form>
    <button class="btn btn-block peach-gradient" type="submit" form="to_register">
      ユーザー登録
    </button>
  </div>
</div>