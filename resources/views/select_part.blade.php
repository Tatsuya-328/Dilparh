<link href="{{ asset('css/style_uru_start_game.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')


<h1 class="title">問題をはじめる</h1>


<div class="wrapper grid">

<!--part1-->
<div class="item">
  <a href="/start/part1" >
<input type="image" name="test" src="{{ asset('image/part1.png') }}"
onmouseover="this.src='{{ asset('image/part1-2.png') }}'"
onmouseout="this.src='{{ asset('image/part1.png') }}'" />
</a>

<p class="container2">語彙数：600 word</p>

</div>



<!--part2-->
<div class="item">
  <a href="/start/part2" >
  <input type="image" name="test" src="{{ asset('image/part2.png') }}"
  onmouseover="this.src='{{ asset('image/part2-2.png') }}'"
  onmouseout="this.src='{{ asset('image/part2.png') }}'" />
</a>

<p class="container2">語彙数：600 word</p>

</div>


<!--part3-->
<div class="item">
<a href="/start/part3" >
  <input type="image" name="test" src="{{ asset('image/part3.png') }}"
  onmouseover="this.src='{{ asset('image/part3-2.png') }}'"
  onmouseout="this.src='{{ asset('image/part3.png') }}'" />
</a>
<p class="container2">語彙数：600 word</p>
</div>

<!--part4-->
<div class="item">
<a href="/start/part4" >
  <input type="image" name="test" src="{{ asset('image/part4.png') }}"
  onmouseover="this.src='{{ asset('image/part4-2.png') }}'"
  onmouseout="this.src='{{ asset('image/part4.png') }}'" />
</a>
<p class="container2">語彙数：600 word</p>
</div>

<!--part5-->
<div class="item">
<a href="/start/part5" >
  <input type="image" name="test" src="{{ asset('image/part5.png') }}"
  onmouseover="this.src='{{ asset('image/part5-2.png') }}'"
  onmouseout="this.src='{{ asset('image/part5.png') }}'" />
</a>
<p class="container2">語彙数：600 word</p>
</div>

<!--part6-->
<div class="item">
<a href="/start/part6" >
  <input type="image" name="test" src="{{ asset('image/part6.png') }}"
  onmouseover="this.src='{{ asset('image/part6-2.png') }}'"
  onmouseout="this.src='{{ asset('image/part6.png') }}'" />
</a>
<p class="container2">語彙数：208 word</p>
</div>
</div>

@endsection