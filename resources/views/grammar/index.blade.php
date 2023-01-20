@extends('layouts.grammar')
@section('content')
<!-- grammar用 進捗circle-->
<!-- <script type='text/javascript' src='https://raw.githubusercontent.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.js' defer></script> -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
<script src="{{ asset('js/grammar/top.js') }}" async></script>

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
  

  <div class="lessons">
  <!-- <div class="circle"><div class="circle-inner">loading</div></div> -->

        <div class="first_wrap dott">
          <div class="progress_circle1 progress_circle_style"></div>
          <label class="lesson_name">
          <a class="lesson_name" href="/grammar/part1">
            <div class="lesson_button">
            ہونا
            </div>
            現在形
            </a>
          </label>
        </div>
    
    <div class="first_wrap reverse reverse-dott">
    <div class="progress_circle2 reverse_progress_circle_style"></div> 
      <label class="lesson_name">
      <a class="lesson_name" href="/grammar/part1">
        <div class="lesson_button">
        ہے
        </div>
        過去形
        </a>
      </label>
    </div>                    
    <div class="first_wrap dott">
    <div class="progress_circle3 progress_circle_style"></div>
      <label class="lesson_name">
      <a class="lesson_name" href="/grammar/part1"> 
        <div class="lesson_button">
        ہیں
        </div>
        完了形
        </a>
      </label>
    </div>
    <div class="first_wrap reverse reverse-dott">
    <div class="progress_circle4 reverse_progress_circle_style"></div> 
      <label class="lesson_name">
      <a class="lesson_name" href="/grammar/part1"> 
        <div class="lesson_button">
        ہونا
        </div>
        疑問文
        </a>
      </label>
    </div>
    <div class="first_wrap dott">
    <div class="progress_circle5 progress_circle_style"></div> 
      <label class="lesson_name">
        <div class="lesson_button not_started">
        ہے
        </div>
        現在進行形
      </label>
    </div>        
    <div class="first_wrap reverse reverse-dott">
    <div class="progress_circle6 reverse_progress_circle_style"></div> 
      <label class="lesson_name">
        <div class="lesson_button not_started">
        ہیں
        </div>
        過去完了形
      </label>
    </div>
    <div class="first_wrap dott">
    <div class="progress_circle7 progress_circle_style"></div> 
      <label class="lesson_name">
        <div class="lesson_button not_started">
        ہے
        </div>
        仮定法過去形
      </label>
    </div>        
    <div class="first_wrap reverse reverse-dott last">
    <div class="progress_circle8 reverse_progress_circle_style"></div> 
      <label class="lesson_name">
        <div class="lesson_button not_started">
        ہیں
        </div>
        完了形
      </label>
    </div>
  </div>
  
<div class=progress>
    <div class="progress_wrapper">
      <p class="progress_text">Progress</p> 
        <div>
          <progress class="progress_bar" max='50' value='30'></progress>
          <span class="progress_num">30 / 50</span>
        </div>
    </div>
</div>
@endsection

    <!-- <div class="e52797_24382"></div> -->
    <!-- <div class="e52797_24383"></div> -->
    <!-- <div class="e52797_24384"></div> -->
    <!-- <div class="e52797_24386"></div>
    <div class="e52797_24482"></div><span  class="e52797_24483">現在進行形</span><span  class="e52797_24484">ہے</span>
    <div class=e52799_24350>
      <div class="e52799_24351"></div>
      <div class="e52799_24352"></div>
      <div class="e52799_24353"></div>
      <div class="e52799_24354"></div>
    </div>
    <div class="e52799_24355"></div><span  class="e52799_24356">過去形</span><span  class="e52799_24357">تھا</span>
    <div class=e52799_24358>
      <div class="e52799_24359"></div>
      <div class="e52799_24360"></div>
      <div class="e52799_24361"></div>
      <div class="e52799_24362"></div>
    </div>
    <div class="e52799_24363"></div><span  class="e52799_24364">仮定法</span><span  class="e52799_24365">ہیں</span>
    <div class=e52799_24366>
      <div class="e52799_24367"></div>
      <div class="e52799_24368"></div>
      <div class="e52799_24369"></div>
      <div class="e52799_24370"></div>
    </div>
    <div class="e52799_24371"></div><span  class="e52799_24372">現在形</span><span  class="e52799_24373">ہونا</span>
    <div class=e52799_24374>
      <div class="e52799_24375"></div>
      <div class="e52799_24376"></div>
      <div class="e52799_24377"></div>
      <div class="e52799_24378"></div>
    </div>
    <div class="e52799_24379"></div><span  class="e52799_24380">未来形</span><span  class="e52799_24381">ہیں</span>
    <div class=e52799_24382>
      <div class="e52799_24383"></div>
      <div class="e52799_24384"></div>
      <div class="e52799_24385"></div>
      <div class="e52799_24386"></div>
    </div>
    <div class="e52799_24387"></div><span  class="e52799_24388">完了形</span><span  class="e52799_24389">ہونا</span>
    <div class=e52799_24390>
      <div class="e52799_24391"></div>
      <div class="e52799_24392"></div>
      <div class="e52799_24393"></div>
      <div class="e52799_24394"></div>
    </div>
    <div class="e52799_24395"></div><span  class="e52799_24396">動詞現在形</span><span  class="e52799_24397">ہے</span> -->

    
      <!-- <div class="unitWrap mark" bis_skin_checked="1">
        <div class="topWrap" bis_skin_checked="1">
          <div class="iconWrap" bis_skin_checked="1">
            <img src="https://webjson.lingodeer.com/mediaSource/static/images/unitPic/other/bookMark.png" alt="bookmark" class="bookMark"> 
            <div class="iconBg color-1-1" bis_skin_checked="1">
            </div> 
            <svg class="progressSVG">
              <circle cx="43" cy="43" r="41" class="progressBg"></circle> 
              <circle cx="43" cy="43" r="41" stroke-dashoffset="258" class="progressMeter"></circle>
              <svg aria-hidden="true" class="icon"><use xlink:href="#icon-new_uicon_143x"></use></svg>
              </svg>
              </div> 
              <div class="unitDetail" bis_skin_checked="1">
                <div class="unitName firstUnitName" bis_skin_checked="1">Nationalities</div>
                <div class="lessonProgressText" bis_skin_checked="1">0/3</div>
              </div>
            </div> 
            <div class="dottedWrap lock" bis_skin_checked="1">
              <svg class="dottedSVG svg-1-1">
                <path d="M45,0 Q55,25 95,25"></path> 
                <path d="M100,25 L240,25"></path>
                <path d="M245,25 Q285,25 295,50"></path>
                </svg>
              </div>
            </div> 
          </div>
        </div>
      </div> -->