@extends('layout')

@section('title', 'Home')

@section('content')
  @include('nav')
  <div class="container">

    @guest
      <!-- ログインしていない場合 -->
      <!-- システム説明 -->
      @include('kakeibo.info')
    @endguest

    @auth
      <!-- ログインしている場合 -->
      <!-- 収支表 -->
      @include('kakeibo.income')
      <!-- 支出表 -->
      @include('kakeibo.spending')
    @endauth
    
    @auth
      <!-- お小遣い -->
      @include('kakeibo.pocket')
    @endauth

    @auth
      <!-- 欲しいものリスト -->
      @include('kakeibo.wants')
    @endauth
  </div>
@endsection