<!-- ログインしている場合 -->
<!-- 収入表 -->
<div class="card mt-3">
  <div class="card-body">
    <div class="card mb-3">
      <div class="card-body">
        <!-- 年月の入力フォーム -->
        <form action="{{ route('index') }}" method="post">
          @csrf
          <div class="row mt-2 align-items-center">
            <div class="col-4 col-sm-3 mt-2">
              <input type="number" class="form-control" name="year" value="{{ $session['year'] ?? date('Y') }}" min="2020">
            </div>
            <div class="col-2 col-sm-1 mt-2">
            年
            </div>
            <div class="col-4 col-sm-3 mt-2">
            <input type="number" class="form-control" name="month" value="{{ $session['month'] ?? date('m') }}" min="1" max="12">
            </div>
            <div class="col-2 col-sm-1 mt-1">
            月
            </div>
            <div class="col-4 col-sm-3 mt-2 offset-sm-1">
              <button type="submit" class="btn btn-block peach-gradient pl-0 m-0">⇒ Go&nbsp;</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <h2 class="card-title peach-gradient">
      <i class="fas fa-yen-sign fa-1x"></i>
      {{ $session['year'] }}年
      {{ $session['month'] }}月
      収入一覧
    </h2>

    <!-- 今月の収入合計 -->
    <income-total
    :incomes="{{ $incomes }}"
    ></income-total>

    <!-- 収入一覧 -->
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">項目</th>
          <th class="text-center">金額</th>
          <th class="text-center">収入日</th>
          <th class="text-right">　</th>
        </tr>
      </thead>
      <tbody>
        @foreach($incomes->all() as $income)
        <tr>
          <td class="text-center">{{ $income->number }}</td>
          <td class="text-center">{{ $income->categoryName($income->category) }}</td>
          <td class="text-center">{{ $income->money }}円</td>
          <td class="text-center">{{ $income->day }}日</td>
          <td class="text-right pt-1">
            <button data-toggle="modal" data-target="#modal-delete-{{ $income->id }}" class="btn bg-secondary text-white">
              <i class="fas fa-trash-alt mr-1"></i>削除
            </button>
          </td>
        </tr>
        <!-- modal -->
        <div id="modal-delete-{{ $income->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('kakeibo.destroy', ['income' => $income]) }}" method="POST">
              @csrf
              @method('DELETE')
                <div class="modal-body">
                  本当に削除してよろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                  <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger">削除する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->
        @endforeach
      </tbody>
    </table>
    <!-- 収入一覧ここまで -->

    <!-- 収入追加ボックス -->
    <div class="card mt-3">
      <form action="{{ route('kakeibo.add') }}" method="post">
        @csrf
        <div class="card-body">
          <h4>＋収入追加</h4>
          @if($errors->any())
            @foreach($errors->all() as $error)
              <span style="color: tomato;">・ {{ $error }}</span><br>
            @endforeach
          @endif
          <div class="row mt-2">
            <div class="col-4 col-sm-3 mt-2">
              <select class="form-select" name="category">
                <option value="" selected>-項目-</option>
                @foreach($in_categories as $category)
                <option value="{{ $category->category_id }}">
                  {{ $category->name }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="col-4 col-sm-3 mt-2">
              <select class="form-select" name="day">
                <option value="">-日付-</option>
                @foreach($days as $day)
                <option value="{{ $day }}">
                  {{ $day }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="col-4 col-sm-3 mt-2">
              <input type="number" class="form-control" min="1" name="money" placeholder="-金額-" value="{{ old('money') }}">
            </div>
            <!-- 認証ユーザーを取得する -->
            <input type="hidden" name="user" value="{{ Auth::user() }}">
            <div class="col-4 col-sm-3 mt-1">
              <button type="submit" class="btn btn-block peach-gradient"> 
                追加
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>