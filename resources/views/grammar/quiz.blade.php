
@extends('layouts.grammar')
@section('content')
<div id="app">
<grammar-component></grammar-component>
<div>
<script src="{{ asset('/js/app.js') }}"></script>

<!-- <div class="content_wrapper"> -->
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

  <?php /* vue componetに移行
  <div class="quiz">
    <div>
      <a href="/grammar/part1/">
        <span class="progress_button">
          <svg class="progress_button_svg" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 0C6.705 0 0 6.705 0 15C0 23.295 6.705 30 15 30C23.295 30 30 23.295 30 15C30 6.705 23.295 0 15 0ZM15 27C8.385 27 3 21.615 3 15C3 8.385 8.385 3 15 3C21.615 3 27 8.385 27 15C27 21.615 21.615 27 15 27ZM15 12.885L20.385 7.5L22.5 9.615L17.115 15L22.5 20.385L20.385 22.5L15 17.115L9.615 22.5L7.5 20.385L12.885 15L7.5 9.615L9.615 7.5L15 12.885Z" fill="#1C1B1F"/>
          </svg>
        </span>
      </a>
      <progress class="quiz_progress_bar" max='50' value='30'></progress>
    </div>
      <div id="game">
          <!-- <h1 id="question_title" class="question_title_style">正解表示する場所/h1> -->
          <h1 class="quesiton_sentence">適切な順番に並び替えてください</h1>
          <div id="field">
              <ul id="answer-area" class="drag-list">
                  <li id="item1" class="answer" draggable="true"></li>
                  <li id="item2" class="answer" draggable="true"></li>
                  <li id="item3" class="answer" draggable="true"></li>
                  <li id="item4" class="answer" draggable="true"></li>
                  <li id="item5" class="answer" draggable="true"></li>
                  <li id="item6" class="answer" draggable="true"></li>
              </ul>
              <div id="select-area" class="drag-list">
                  <div id="item1" class="select" draggable="true"></div>
                  <div id="item2" class="select" draggable="true"></div>
                  <div id="item3" class="select" draggable="true"></div>
                  <div id="item4" class="select" draggable="true"></div>
                  <div id="item5" class="select" draggable="true"></div>
                  <div id="item6" class="select" draggable="true"></div>
              </div>
          </div>

          <!-- <ul class="drag-list">
            <li id="item1" draggable="true">1.ドラッグ＆ドロップで</li>
            <li id="item2" draggable="true">2.リストの順番が</li>
            <li id="item3" draggable="true">3.入れ替わります</li>
          </ul> -->

          <div id="btn">
              <button onclick="showQuestion()">リセット</button>
          </div>

          <div id="check">
              <button onclick="checkAnswer()">回答する</button>
          </div>
      </div>
      <div id="next">

      </div>

    <script type="text/javascript" src="main.js"></script>
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
*/ ?>

@endsection