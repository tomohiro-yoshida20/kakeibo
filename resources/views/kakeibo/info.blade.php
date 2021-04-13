<div class="card mt-3">
  <div class="card-body img">
    <div class="row">
      <div class="col-12">
        <div class="flex">
          <div class="info">
            <div>
              <h1 class="card-title peach-gradient">
                -- かんたん家計簿 -- 
              </h1>
              <div class="card-text text-white mt-4 ">
                <!-- 【当サービスについて】 -->
                <p class="infont">家計簿サービスです。</p>
                <p class="infont">指定の月毎に収入及び支出を登録できます。</p>
                <p class="infont">シンプルで見やすい！</p>
                <p class="infont">ユーザー登録して今すぐ家計簿を開始</p>
                <p class="infont">↓↓↓</p>
                <form id="to_register" action="{{ route('register') }}"></form>
              </div>
              <div class="offset-2 col-6">
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