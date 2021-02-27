@extends('template')

@section('title','送信完了 | 議事録')

@section('content')
<div class="container text-center">
  <h1 class="my-4">
    議事録の通知メールの送信を完了しました。
  </h1>
  <a href="{{route('index')}}">フォームに戻る</a>
</div>
@endsection
