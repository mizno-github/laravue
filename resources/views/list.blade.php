@extends('layouts.app')

@section('content')
<h1>URLリスト</h1>
<ul>
    <li><a href="{{ route('design.modal') }}">モーダル</a></li>
    <li><a href="{{ route('design.tabMenu') }}">タブメニュー</a></li>
    <li><a href="{{ route('design.sideMenu') }}">サイドメニュー</a></li>
</ul>
@endsection
