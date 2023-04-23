<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
@extends('layouts.grammar')
@section('content')
<div id="app">
  <Grammarquiz-component></Grammarquiz-component>
</div>

<div class="content_wrapper">
  <!--  e52821_24419 
  <div class="side_bar"> 
      <span  class="e52797_24420">About</span>
      <span  class="e52797_24421">Support</span>
      <span  class="e52797_24422">Dictionary</span>
      <span  class="e52797_24426">Home</span>
  </div>
  -->

  <!-- <div class=side-bar>
    <ul class="nav_menu_ul">
      <li class="nav_menu_li first_nav_menu_li"><a href="{{ route('index') }}">Home</a></li>
      <li class="nav_menu_li"><a href="/dictionary/japanese">Dictionary</a></li>
      <li class="nav_menu_li"><a href="{{ route('about') }}">About</a></li>
      <li class="nav_menu_li"><a href="{{ route('config') }}">Support</a></li>
    </ul>
  </div> -->

  
    
  </div>
<!-- <div class=progress>
    <div class="progress_wrapper">
      <p class="progress_text">Progress</p> 
        <div>
          <progress class="progress_bar" max='50' value='30'></progress>
          <span class="progress_num">30 / 50</span>
        </div>
    </div>
</div> -->
@endsection