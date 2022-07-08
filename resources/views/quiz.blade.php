<link href="{{ asset('css/style_uru_test.css') }}" rel="stylesheet">
<link href="{{ asset('css/style_uru_answer.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
<!-- <pre>
@php
var_dump($words);
@endphp
</pre> -->

<div id="app">
    <audio id="preaudio{{ $words[0]['word_id'] }}" preload="auto" muted autoplay>
        <source src="/audio/{{ $words[0]['word_id'] }}.mp3" type="audio/mp3">
    </audio>
    <?php foreach ($words as $word) : ?>
        <audio id="audio{{ $word['word_id'] }}" preload="auto">
            <source src="/audio/{{ $word['word_id'] }}.mp3" type="audio/mp3">
        </audio>
    <?php endforeach; ?>
    <sample-component user_id="{{ Auth::id() }}" v-bind:words='@json($words)' v-bind:dummywords='@json($dummywords)'></sample-component>
</div>

@endsection