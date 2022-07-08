<link href="{{ asset('css/uru_dictionary.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')


<!--検索結果-->
<h1 class="title"><b>検索結果</b></h1>
<p class="vocabrary">「<?php echo $word; ?>」の検索結果</p>

@if ($results)
  @foreach($results as $result)
  <div class="textbox">
    <p class="answer-text">{{ $loop->index + 1}}. {{ $result['word_urdu'] }}　[{{ $result['pron'] }}]：{{ $result['japanese'] }}</p>
  </div>
  @endforeach
@else    
  <div class="textbox">
    <p class="notfound-text">単語が見つかりませんでした。</p>
  </div>
@endif

<div class="swich_zone">
  <div class="swich">

    <input onclick="window.history.back(); return false;" type="image" src="{{ asset('image/back_button.png') }}" onmouseover="this.src='{{ asset('image/back_button2.png') }}'" onmouseout="this.src='{{ asset('image/back_button.png') }}'">

  </div>
  <div>



    @endsection