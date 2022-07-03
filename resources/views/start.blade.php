<link href="{{ asset('css/style_uru_start_game.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')

<!--コンテンツ-->
<h1 class="title"><?php echo $title; ?></h1>
<p class="explanation"><?php echo $explanation; ?></p>

<!-- <div class="teachermessage">
        <div class="balloon2-right">
          <p>
            今回は3問ミスだ！3問ミスしたという事は<br>
            7問正解したということだ！<br>
            気を落とさずに引き続き頑張りたまえ！<br>
</p>
          <p class="byteacher">
          by ウルドゥー先生
          </p>
          

        </div>
        <img
          src="/image/teacher1_new.png"
          alt=""
          class="teacher"
        />
      </div> -->

<!--レベルのバー-->
<div class="bar">
  <progress class="progress_bar" max=<?php echo $totalNum; ?> value=<?php echo $masterNum; ?>></progress>
  <!-- <img class="level_bar" src="{{ asset('image/level_bar.png') }}" alt="レベルを示すバー"> -->
</div>


<h3 class="level"><?php echo $level; ?></h3>

<!-- 何語解くか決める（セレクトボックスにして10,20,30区切りとかでもいいかも？） -->
<form method="post">
  @csrf
  <div class="form-group">
    <select class="form-control" name="quantitiy" id="quantitiy">
      <option>10語</option>
      <option>20語</option>
      <option>30語</option>
      <option>40語</option>
      <option>50語</option>
    </select>
    <label for="exampleFormControlSelect1">演習する</label>
  </div>

  <!--ボタン-->
  <div class="button-area">
    <?php if ($totalNum > 0): ?>
      <input type="image" src="{{ asset('image/try_button.png') }}" onmouseover="this.src='{{ asset('image/try_button2.png') }}'" onmouseout="this.src='{{ asset('image/try_button.png') }}'" width="220px" height="auto" formaction="/start/part<?php echo $part; ?>/quiz"></input>
      <input type="image" src="{{ asset('image/retry_button.png') }}" onmouseover="this.src='{{ asset('image/retry_button2.png') }}'" onmouseout="this.src='{{ asset('image/retry_button.png') }}'" width="220px" height="auto" formaction="/start/part<?php echo $part; ?>/quiz/review">
    <?php else: ?>
      <input disabled type="image" src="{{ asset('image/try_button.png') }}" onmouseover="this.src='{{ asset('image/try_button2.png') }}'" onmouseout="this.src='{{ asset('image/try_button.png') }}'" width="220px" height="auto" formaction="/start/part<?php echo $part; ?>/quiz"></input>
      <input disabled type="image" src="{{ asset('image/retry_button.png') }}" onmouseover="this.src='{{ asset('image/retry_button2.png') }}'" onmouseout="this.src='{{ asset('image/retry_button.png') }}'" width="220px" height="auto" formaction="/start/part<?php echo $part; ?>/quiz/review">
    <?php endif; ?>

    </form>
</div>

@endsection