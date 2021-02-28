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
<select class="form-select" id="name" name = "name" aria-label="Default select example">
  <option selected>名前</option>
  <option value="政">政</option>
  <option value="犬">犬</option>
  <option value="猫">猫</option>
  <option value="4"></option>
</select>

<div class="form-group">
  <label for="email">To</label>
  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="メールアドレス" value="ohaoha.0610@gmail.com"/>
  <div class="invalid-feedback">
    @error('email')
      {{$message}}
    @enderror
  </div>
</div>

<div class="form-group">
  <label for="Cc">Cc</label>
  <textarea type="text" name="Cc" class="form-control  @error('email') is-invalid @enderror" id="Cc" placeholder="メールアドレス" value="">{{$Cc}}</textarea>
  <div class="invalid-feedback">
    @error('email')
      {{$message}}
    @enderror
  </div>
</div>

<div class="form-group">
  <label for="title">タイトル</label>
  <textarea name="title" class="form-control @error('text') is-invalid　@enderror" id="title"  rows="1" placeholder="タイトル">{{$date}}({{$week}})グループワーク議事録</textarea>
  <div class="invalid-feedback">
  @error('text')
  {{$message}}
  @enderror
  
  </div>
</div>


<div class="form-group">
  <label for="text">本文</label>
  <textarea name="text" class="form-control @error('text') is-invalid @enderror" id="text"  rows="10" placeholder="本文">
{{$tex}}
{{old('text',session('report.text'))}}



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
<div class="text-light">見ないでね</div>
</form>
</div>

<script>
  let select = document.querySelector('[id="name"]')
  let text = document.querySelector('[name="text"]')
  let title = document.querySelector('[name="title"]')
  let text_begi = 'お疲れ様です。「Everest」の'
    select.onchange = event => {
    let name = select.value;
    let tit = title.innerHTML;
    new_tit = tit + '\t' + name; 
    title.innerHTML = new_tit
    let tex = text.innerHTML
    new_tex =text_begi + name + tex + name;
    text.innerHTML = new_tex;
  }
</script>
@endsection