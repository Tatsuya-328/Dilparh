@extends('layouts.app')

@section('content')

<h1 class="title">使い方を学ぶ</h1>

<!--切り替えボタン-->
              <div class="swich_zone">
              <div class="swich1">
              <a href="{{ route('how') }}">
                <input type="image" name="test" src="{{ asset('image/howto_pc2.png') }}"
                      onmouseover="this.src='{{ asset('image/howto_pc2.png') }}'"
                      onmouseout="this.src='{{ asset('image/howto_pc2.png') }}'" />
                    </a>
             
                </div>


                <div class="swich2">
                <a href="{{ route('how_sp') }}">
                    <input type="image" name="test" src="{{ asset('image/howto_sp1.png') }}"
                    onmouseover="this.src='{{ asset('image/howto_sp2.png') }}'"
                    onmouseout="this.src='{{ asset('image/howto_sp1.png') }}'" />
                </a>
           
                </div>

              </div>
  <p class="device">ー For PC ー</p>


  <!--説明2カラム-->
              <div class="contents1 wrapper">
                <img class="howto_image" src="{{ asset('image/pc1.png') }}">

                <aside>
                  <h1 class="step">STEP 1</h1>
              <p class="contents1_text">
                ホームにある真ん中のボタン” 問題をはじめる ”を選ぶ
              </p>
                </aside>
              </div>




              <div class="contents1 wrapper">
                <img class="howto_image" src="{{ asset('image/pc2.png') }}">

                <aside>
                  <h1 class="step">STEP 2</h1>
              <p class="contents1_text">
                自分に合わせた語彙レベルを選ぶ
              </p>
                </aside>
              </div>



              <div class="contents1 wrapper">
                <img class="howto_image" src="{{ asset('image/pc3.png') }}">

                <aside>
                  <h1 class="step">STEP 3</h1>
              <p class="contents1_text">
                演習したい人は左のボタン” 演習する ”<br>
                前回間違えた問題を復習したい人は” ニガテを復習する ”を選ぶ
              </p>
                </aside>
              </div>



              <div class="contents1 wrapper">
                <img class="howto_image" src="{{ asset('image/pc4.png') }}">

                <aside>
                  <h1 class="step">STEP 4</h1>
              <p class="contents1_text">
                スタートボタンをクリックすると、問題がスタートします
              </p>
                </aside>
              </div>



              <div class="contents1 wrapper">
                <img class="howto_image" src="{{ asset('image/pc5.png') }}">

                <aside>
                  <h1 class="step">STEP 5</h1>
              <p class="contents1_text">
                語彙に合う訳を選ぶ
              </p>
                </aside>
              </div>

@endsection