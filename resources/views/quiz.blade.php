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
    <sample-component user_id="{{ Auth::id() }}" v-bind:words='@json($words)' v-bind:dummywords='@json($dummywords)'></sample-component>
</div>

@endsection