<link href="{{ asset('css/uru_dictionary.css') }}" rel="stylesheet">
<link href="{{ asset('css/style_uru_test.css') }}" rel="stylesheet">
<link href="{{ asset('css/style_uru_answer.css') }}" rel="stylesheet">


@extends('layouts.app')

@section('content')


<!--検索結果-->
<h1 class="title"><b>検索結果</b></h1>
<p class="vocabrary">「<?php echo $word; ?>」の検索結果</p>

@if ($results)
@foreach($results as $result)
<!-- <div class="textbox">
    <p class="answer-text">{{ $loop->index + 1}}. {{ $result['word_urdu'] }}　[{{ $result['pron'] }}]：{{ $result['japanese'] }}</p>
  </div> -->
<audio id="audio<?= $result['word_id'] ?>" preload="auto">
  <source src="/audio/<?= $result['word_id'] ?>.mp3" type="audio/mp3">
</audio>
<div class="whole-contents-wrapper_wrong">
  <!-- <article>
              <h2 class="answer-text2" v-if="word_id.japanese == answers[index]">
                〇
              </h2>
              <h2 class="answer-text3" v-else>×</h2>
            </article> -->

  <aside>
    <div class="answer-wrapper">
      <img src="/image/voice.png" alt="" class="voice" onclick="ring(<?= $result['word_id'] ?>)" />
      <h2 class="answer-text">
        {{ $loop->index + 1}}.{{ $result['word_urdu'] }}　[{{ $result['pron'] }}]：{{ $result['japanese'] }}
      </h2>
    </div>
    <div class="answer-wrapper">
      <img src="/image/voice.png" alt="" class="voice2" />
      <h6 class="example-text">{{ $result['ExampleSentence'] }}<br>
        {{ $result['ExampleMeaning'] }}
      </h6>
    </div>
  </aside>
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

    <script>
      function ring(id) {
        // console.log("audio" + (id - 1));
        // 再生中のものは停止してから
        // if (document.getElementById("audio" + (id - 1))) {
        //   console.log("audio" + document.getElementById("audio" + (id - 1)));
        //   document.getElementById("audio" + (id - 1)).pause();
        // }
        // document.getElementById("audio" + id).pause();
        document.getElementById("audio" + id).play();
      }
    </script>