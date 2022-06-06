@extends('layouts.app')

@section('content')
<!--ホームのコンテンツ-->
<div class="logo">
  <input type="image" name="test" src="{{ asset('image/logo12.png') }}"
  onmouseover="this.src='{{ asset('image/logo13.png') }}'"
  onmouseout="this.src='{{ asset('image/logo12.png') }}'" />
</div>

<script src="http://code.jquery.com/jquery-2.0.3.min.js" charset="utf-8"></script>

<!--使い方-->
<div class="wrapper grid">
  <div class="item">
    <a href="{{ route('how') }}" >
      <input type="image" name="test" src="{{ asset('image/1-2.png') }}"
      onmouseover="this.src='{{ asset('image/1.png') }}'"
      onmouseout="this.src='{{ asset('image/1-2.png') }}'" />
    </a>
</div>


<!--問題を始める-->
<div class="item">
  <a href="{{ route('select_part') }}">
    <input type="image" name="test" src="{{ asset('image/2-2.png') }}"
    onmouseover="this.src='{{ asset('image/2.png') }}'"
    onmouseout="this.src='{{ asset('image/2-2.png') }}'" />
  </a>
</div>


<!--単語検索-->
<div class="item">
  <a href="dictionary/japanese" >
    <input type="image" name="test" src="{{ asset('image/dic2.png') }}"
    onmouseover="this.src='{{ asset('image/dic.png') }}'"
    onmouseout="this.src='{{ asset('image/dic2.png') }}'" />
  </a>
</div>



</div>
@endsection