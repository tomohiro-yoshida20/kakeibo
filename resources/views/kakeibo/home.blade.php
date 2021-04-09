@extends('layout')

@section('title', 'Home')

@section('content')
  @include('nav')
  <div class="container">

    @guest
    <!-- ログインしていない場合 -->
    <div class="card mt-3">
      <div class="card-body">
        <h2 class="card-title">
          家計簿タイトル
        </h2>
        <div class="card-text">
          【当サービスについて】
          <p>家計簿サービスです</p>
          <p>指定の月毎に収入及び支出を登録できます</p>
          <p>月ごとの収入及び支出をグラフで見られます</p>
          <p>前月との差分チェックができます</p>
          <p>今月のお小遣いを設定できます</p>
          <p>欲しいものリストを登録できます</p>
          <p>アドバイスをくれます</p>
          <p>↓ ボタンからユーザー登録して今すぐ家計簿開始</p>
        </div>
        <button class="btn btn-block peach-gradient">
          ユーザー登録
        </button>
      </div>
    </div>
    @endguest

    @auth
    <!-- ログインしている場合 -->
    <!-- 収支表 -->
    <div class="card mt-3">
      <div class="card-body">
        <h2 class="card-title peach-gradient">
          <i class="fas fa-yen-sign fa-1x"></i>
          家計簿
          2021年
           4月
           収入表
        </h2>

        <!-- 収入リスト（コンポーネント） -->
        <income-list></income-list>

        <!-- 収入追加ボックス -->
        <div class="card mt-3">
          <div class="card-body">
            <h4>＋収入追加ボックス</h4>
            <div class="row">
              <div class="col-3">
                <select class="form-select" aria-label="Default select example">
                  <option selected>収入項目</option>
                  <option value="1">給与</option>
                  <option value="2">還付金</option>
                  <option value="3">その他</option>
                </select>
              </div>
              <div class="col-3">
                <select class="form-select" aria-label="Default select example">
                  <option value="">日付</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
              <div class="col-3">
                <input type="text" class="form-control"placeholder="金額">
              </div>
              <div class="col-3">
                <button class="btn btn-block peach-gradient"> 
                  収入を追加
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 欲しいものリスト -->
    <div class="card my-3">
      <div class="card-body">
        <h2 class="card-title peach-gradient">
          <i class="fas fa-hand-holding-usd fa-1x"></i>
          お小遣い
        </h2>
        今月お小遣い
        <br>
        残り：30000 円
      </div>
    </div>
    <!-- 欲しいものリスト -->
    <div class="card my-3">
      <div class="card-body">
        <h2 class="card-title peach-gradient">
          <i class="fas fa-boxes fa-1x"></i>
          欲しいものリスト
        </h2>
        <div class="card mt-3">
          <div class="card-body">
            <h4>欲しい物1</h4>
            ここで一覧を増やしていく<br>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <h4>欲しい物1</h4>
            ここで一覧を増やしていく<br>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <h4>欲しい物1</h4>
            ここで一覧を増やしていく<br>
          </div>
        </div>
      </div>
    </div>
    @endauth
  </div>
@endsection