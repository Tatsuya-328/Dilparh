<link href="{{ asset('css/uru_dictionary.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')




<h1 class="title"><b>単語検索</b></h1>


<!--言語切り替えのボタン-->
<div class="swich_zone">

  <div class="swich1">
    <a href="/dictionary/japanese">
      <input type="image" src="{{ asset('image/japanese2.png') }}" onmouseover="this.src='{{ asset('image/japanese2.png') }}'" onmouseout="this.src='{{ asset('image/japanese2.png') }}'">

    </a>
  </div>


  <div class="swich2">
    <a href="/dictionary/urdu">
      <input type="image" src="{{ asset('image/uru.png') }}" onmouseover="this.src='{{ asset('image/uru2.png') }}'" onmouseout="this.src='{{ asset('image/uru.png') }}'">

    </a>
  </div>
</div>



<!--入力ゾーン-->
<!-- <form action="" method="" name="japanese">
  <b>日本語</b>を入力してください： <input class="textbox" type="text"><br> -->


<!--検索ボタン-->
<!-- <div class="button_area">
    <a class="button" href="uru_dictionary3.html">検索</a>
  </div>
</form> -->


<form method="post" action="/dictionary/japanese/result">
  @csrf
  <b>日本語</b>を入力してください： <input class="textbox" name="word" id="word"></input><br>


  <!--ボタン-->
  <div class="button-area">
    <button type="submit" class="button">検索</button>
  </div>
</form>


@endsection