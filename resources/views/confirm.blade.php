@extends('template')

@section('title','送信確認 | 議事録')


@section('content')
<div class="jumbotron">
  <div class="container">
    <h1 class="display-5">
      送信内容の確認
    </h1>
    <p>以下の内容でメールを送信します。</p>
  </div>
</div>

<div class="container">
<form action="{{route('confirm')}}" method="post">
  @csrf
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th scope="row">To</th>
        <td>{{ session('report.email')}}</td>
    </tbody>
    <tbody>
      <tr>
        <th scope="row">Cc</th>
        <td>{{ session('report.Cc')}}</td>
    </tbody>
    <tbody>
      <tr>
        <th scope="row">Title</th>
        <td>{{ session('report.title')}}</td>
    </tbody>
    <tbody>
      <tr>
        <th scope="row">本文</th>
        <td>{{ session('report.text')}}</td>
    </tbody>
  </table>

  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary">送信する</button>
    <a class="btn btn-secondary" href="{{route('index')}}">戻る</a>
  </div>

</form>
</div>

@endsection