@extends('layouts.grammar')

@section('content')
<div class="content_wrapper">
  <!--  e52821_24419 
  <div class="side_bar"> 
      <span  class="e52797_24420">About</span>
      <span  class="e52797_24421">Support</span>
      <span  class="e52797_24422">Dictionary</span>
      <span  class="e52797_24426">Home</span>
  </div>
  -->

  <div class=side-bar>
    <ul class="nav_menu_ul">
      <li class="nav_menu_li first_nav_menu_li"><a href="{{ route('index') }}">Home</a></li>
      <li class="nav_menu_li"><a href="#">Dictionary</a></li>
      <li class="nav_menu_li"><a href="#">About</a></li>
      <li class="nav_menu_li"><a href="#">Support</a></li>
    </ul>
  </div>

  <div class="lessons part">
    <a href="{{ route('index') }}">
    <div class="back_button">
      <svg width="16" height="26" viewBox="0 0 16 26" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15.7185 3.4375L12.781 0.5L0.281006 13L12.781 25.5L15.7185 22.5625L6.17684 13L15.7185 3.4375Z" />
      </svg>
      <span>
        現在形
      </span>
    </div>
    </a>
    <div class="item_wrapper">
      <a href="/grammar/part1/quiz1">
        <div class="item">
          <button
            type="button"
          >
            肯定文
          </button>
        </div>
      </a>
      <a href="/grammar/part1/quiz1">
        <div class="item">
          <button
            type="button"
          >
            否定文
          </button>
        </div>
      </a>
      <a href="/grammar/part1/quiz1">
        <div class="item">
          <button
            type="button"
          >
            疑問文
          </button>
        </div>
      </a>
      <a href="/grammar/part1/quiz1">
        <div class="item">
          <button
            type="button"
          >
            命令文
          </button>
        </div>
      </a>
    </div>
  </div>
  
<div class="progress part">
    <div class="progress_wrapper">
      <p class="progress_text">Progress</p> 
        <div>
          <progress class="progress_bar" max='50' value='30'></progress>
          <span class="progress_num">30 / 50</span>
        </div>
    </div>
</div>
@endsection