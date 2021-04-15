<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Income;
use App\Spending;
use App\Category;
use App\Http\Requests\AddRequest;

use Carbon\Carbon;
use Session;

class KakeiboController extends Controller
{
    // 初期表示
    // public function home()
    // {
    //     return view('kakeibo.home');
    // }

    // 表示
    public function index(Request $request)
    {
        // リクエストが空ならログインがないためサービスtopへ
        if (empty($request->user()->id)) {
            return view('kakeibo.home');
        }
        
        $session = Session::all();
        // 選択年月は セッションへ
        Session::put('year', $request['year'] ?? ($session['year'] ?? date('Y')));
        Session::put('month', $request['month'] ?? ($session['month'] ?? date('m')));
        $session = Session::all();

        // 格納している年月分だけを表示
        $incomes = Income::all()
        ->where('year','=' , $session['year'])
        ->where('month','=' , $session['month'])
        ->sortBy('day');
        
        $spendings = Spending::all()
        ->where('year','=' , $session['year'])
        ->where('month','=' , $session['month'])
        ->sortBy('day');
        
        // 収入格納順番を生成
        $i = 1;
        foreach($incomes as $income) {
            $income->number = $i;
            $i++;
        }
        
        // 支出格納順番を生成
        $i = 1;
        foreach($spendings as $spending) {
            $spending->number = $i;
            $i++;
        }

        // セレクトボックス（カテゴリー） shubetsu:0 収入, shubetsu:1 支出
        $in_categories = Category::all()->where('shubetsu','=','0')->sortBy('category_id');
        $sp_categories = Category::all()->where('shubetsu','=','1')->sortBy('category_id');

        // セレクトボックス（日付）
        $setYear = $session['year'];
        $setMonth = $session['month'];
        $lastDay = Carbon::create($setYear, $setMonth, 1)->lastOfMonth(); 
        $lastDay = $lastDay->toArray()["day"];
        $days = [];
        for ($i=1;$i<=$lastDay;$i++)
        {
            array_push($days, $i);
        }

        return view('kakeibo.home', ['incomes' => $incomes, 'spendings' => $spendings, 'in_categories' => $in_categories, 'sp_categories' => $sp_categories,'days' => $days, 'session' => $session]);
    }

    // 収入追加
    public function store(AddRequest $request)
    {
        $session = Session::all();
        $income = new Income;
        // ログインユーザーのID
        $income->user_id = $request->user()->id;
        $income->year = $session['year'];
        $income->month = $session['month'];
        $income->day = $request->day;
        $income->money = $request->money;
        $income->category = $request->category;
        $income->save();
        return redirect()->route('index');
    }

    // 収入削除
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('index');
    }

    // 支出追加
    public function sp_store(AddRequest $request)
    {
        $session = Session::all();
        $spending = new spending;
        // ログインユーザーのID
        $spending->user_id = $request->user()->id;
        $spending->year = $session['year'];
        $spending->month = $session['month'];
        $spending->day = $request->day;
        $spending->money = $request->money;
        $spending->category = $request->category;
        $spending->save();
        return redirect()->route('index');
    }

    // 支出削除
    public function sp_destroy(Spending $spending)
    {
        $spending->delete();
        return redirect()->route('index');
    }

}
