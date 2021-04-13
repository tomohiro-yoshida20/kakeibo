@extends('layout')

@section('title', 'Home')

@section('content')
  @include('nav')
  <div class="container">

    <!-- ログインしていない場合 -->
    @guest
      <!-- システム説明 -->
      @include('kakeibo.info')
    @endguest

    <!-- ログインしている場合 -->
    @auth
      <div class="mt-3">
        <button class="btn peach-gradient" id="change_btn">収入⇔支出</button>
      </div>
      <!-- 収支表 -->
      <div class="" id="income_field">
        @include('kakeibo.income')
      </div>
      <!-- 支出表 -->
      <div class="none" id="spending_field">
        @include('kakeibo.spending')
      </div>
    @endauth
    
    @auth
      <!-- 貯金 -->
      @include('kakeibo.pocket')
    @endauth
  </div>
@endsection