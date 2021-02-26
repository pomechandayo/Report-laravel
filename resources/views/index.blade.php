@extends('template')

@section('title','議事録定形文')

@section('content')
<div class="jumbotron">
  <div class="container">
    <h1 class="display-5">議事録</h1>
  </div>
</div>

<div class="container ">
<form action="{{route('report')}}" method="POST">
@csrf
<div class="form-group">
  <label for="email">To</label>
  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="メールアドレス" value="@gmail"/>
  <div class="invalid-feedback">
    @error('email')
      {{$message}}
    @enderror
  </div>
</div>

<div class="form-group">
  <label for="Cc">Cc</label>
  <input type="text" name="Cc" class="form-control @error('email') is-invalid @enderror" id="Cc" placeholder="メールアドレス" value="@gmail@gmail@gmail@gmail"/>
  <div class="invalid-feedback">
    @error('email')
      {{$message}}
    @enderror
  </div>
</div>

<div class="form-group">
  <label for="title">タイトル</label>
  <textarea name="title" class="form-control @error('text') is-invalid　@enderror" id="title"  rows="1" placeholder="タイトル">{{$date}}({{$week}})チーム「Everest」グループワーク議事録</textarea>
  <div class="invalid-feedback">
  @error('text')
  {{$message}}
  @enderror
  
  </div>
</div>


<div class="form-group">
  <label for="text">本文</label>
  <textarea name="text" class="form-control @error('text') is-invalid @enderror" id="text"  rows="10" placeholder="本文">
お疲れ様です。
  
本日のグループワークの内容をご報告いたします。

【本日の内容】
【次回の予定】

以上です

  </textarea>
  <div class="invalid-feedback">
  @error('text')
  {{$message}}
  @enderror
  
  </div>
</div>

<div class="text-center">
  <button class="btn btn-primary display:inline-block mb-100" type="submit" >確認画面</button>
</div>
<div class="text-light">隠し画面</div>
</form>
</div>
@endsection