<div class="card mt-3">
  <div class="card-body img">
    <div class="row">
      <div class="col-12">
        <div class="flex">
          <div class="info">
            <div class="mx-3">
              <h1 class="card-title">
                かんたん家計簿 
              </h1>
              <div class="card-text text-white mt-4">
                <!-- 【当サービスについて】 -->
                <p class="">家計簿サービスです。</p>
                <p class="">指定の月毎に収入及び支出を登録できます。</p>
                <p class="">シンプルで見やすい！</p>
                <p class="">ユーザー登録して今すぐ家計簿を開始</p>
                <p class="">↓↓↓</p>
                <form id="to_register" action="{{ route('register') }}"></form>
              </div>
              <div class="mx-auto col-10">
                <button class="btn btn-block peach-gradient" type="submit" form="to_register">
                  ユーザー登録
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>