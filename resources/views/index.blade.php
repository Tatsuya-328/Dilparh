@extends('layouts.app')

@section('content')
<!--ホームのコンテンツ-->
<div class="logo">
  <input type="image" name="test" src="{{ asset('image/logo12.png') }}"
  onmouseover="this.src='{{ asset('image/logo13.png') }}'"
  onmouseout="this.src='{{ asset('image/logo12.png') }}'" />
</div>

<div>
    <p>音声を確認したい単語を入力してください。</p>
    <input type="text" id="word"></form>
    <button id="button" onclick="pronounce()">発音を確認</button>
  </div>

<script type="text/javascript">

  'use strict'

  function pronounce() {

    let word = document.getElementById('word').value;
    let u = new SpeechSynthesisUtterance();
    // u.lang = 'en-US';
    u.lang = 'hi-IN';
    u.text = word;
    speechSynthesis.speak(u);

  }

</script>

<textarea id="utterance"></textarea><br>
<button id="tts_button">発音</button><br>
<div id="audio_div"></div><br>
<div id="url"></div>

<script src="http://code.jquery.com/jquery-2.0.3.min.js" charset="utf-8"></script>
<script>
  $(function() {

$('#tts_button').click(tts);

function tts() {
    var lang = 'ja';
    var tts_url = 'http://translate.google.com/translate_tts?tl=' + lang + '&q=';
    var tts_utterance = $('#utterance')[0].value;
    console.log('utterance:' + tts_utterance);
    tts_utterance = encodeURIComponent(tts_utterance);
    tts_url += tts_utterance;
    console.log('tts_url:' + tts_url);
    var inner_html = '<iframe src="' + tts_url + '" style="display:none;"></iframe>';
    console.log('html:' + inner_html);
    $('#audio_div')[0].innerHTML = inner_html;

    var href_url = 'URL:<a href="' + tts_url + '">' + tts_url + '</a>';
    $('#url')[0].innerHTML = href_url;
}

});

</script>

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