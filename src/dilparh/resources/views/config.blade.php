<link href="{{ asset('css/style_uru_menu.css') }}" rel="stylesheet">

@extends('layouts.app')


@section('content')


<!--コンテンツ-->
<h1 class="title">設定</h1>

<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>
<!-- モーダルエリアここから -->
<section id="modalArea" class="modalArea">
  <div id="modalBg" class="modalBg"></div>
  <div class="modalWrapper">
    <div class="modalContents">
      <h1>変更<br>が完了しました。</h1>
    </div>
    <div id="closeModal" class="closeModal">
      ×
    </div>
  </div>
</section>
<!-- モーダルエリアここまで -->
<!--切り替えボタン-->
<center>
  <div class="tab_wrap">
    <input id="tab1" type="radio" name="tab_btn" checked>
    <input id="tab2" type="radio" name="tab_btn">
    <input id="tab3" type="radio" name="tab_btn">

    <div class="tab_area">
      <label class="tab1_label" for="tab1">アカウント設定</label>
      <label class="tab2_label" for="tab2">リセット</label>
      <label class="tab3_label" for="tab3">ログアウト</label>
    </div>



    <!--アカウント情報-->
    <div class="panel_area">
      <div id="panel1" class="tab_panel1">

        <h3 class="title2"><b>アカウント情報を変更する</b></h3>
        <form action="/edit_account" method="POST" name="mail_adress">
          @csrf
          メールアドレス：<input class="textbox" type="email" name="email" id="email"><br>

          <div class="button_area">
            <input type="button" id="update" value="送信" class="button">
          </div>
        </form>
      </div>


      <!--リセット-->
      <div id="panel2" class="tab_panel2">

        <h3 class="title2">今までの問題の記録をリセット</h3>

        <!--リセット（見えているところ）-->
        <div class="item">
          <p class="reset-text">▶ Part1のみの記録をリセットできます</p>
          <div class="button_area">
            <a href="#" class="js-modal-open" data-target="modal01">Part 1をリセットする</a>
          </div>
        </div>

        <div class="item">
          <p class="reset-text">▶ Part2のみの記録をリセットできます</p>
          <div class="button_area">
            <a href="#" class="js-modal-open" data-target="modal02">Part 2をリセットする</a>
          </div>
        </div>

        <div class="item">
          <p class="reset-text">▶ Part3のみの記録をリセットできます</p>
          <div class="button_area">
            <a href="#" class="js-modal-open" data-target="modal03">Part 3をリセットする</a>
          </div>
        </div>

        <div class="item">
          <p class="reset-text">▶ Part4のみの記録をリセットできます</p>
          <div class="button_area">
            <a href="#" class="js-modal-open" data-target="modal03">Part 4をリセットする</a>
          </div>
        </div>

        <div class="item">
          <p class="reset-text">▶ Part5のみの記録をリセットできます</p>
          <div class="button_area">
            <a href="#" class="js-modal-open" data-target="modal03">Part 5をリセットする</a>
          </div>
        </div>

        <div class="item">
          <p class="reset-text">▶ Part6のみの記録をリセットできます</p>
          <div class="button_area">
            <a href="#" class="js-modal-open" data-target="modal03">Part 6をリセットする</a>
          </div>
        </div>

        <div class="item">
          <p class="reset-text">▶ 全ての記録をリセットできます</p>
          <div class="button_area">
            <a href="#" class="js-modal-open" data-target="modal03">全てリセットする</a>
          </div>
        </div>



        <!--リセット（モーダル）-->
        <div id="modal01" class="modal js-modal">
          <div class="modal-bg js-modal-close">
          </div>
          <div class="modal-content">
            <p class="modal-text">本当にPart1の問題をリセットしてもよろしいですか？<br>
              注意：この操作は取り消すことができません。
            </p>
            <div class="or">
              <a href="#" class="js-modal-close">キャンセル</a>
              <a href="#" class="delete" id="part1">リセットする</a>
            </div>
          </div>
        </div>



        <div id="modal02" class="modal js-modal">
          <div class="modal-bg js-modal-close">
          </div>
          <div class="modal-content">
            <p class="modal-text">本当にPart2の問題をリセットしてもよろしいですか？<br>
              注意：この操作は取り消すことができません。
            </p>
            <a href="#" class="js-modal-close">キャンセル</a>
            <a href="#" class="delete" id="part2">リセットする</a>
          </div>
        </div>
      </div>



      <div id="modal03" class="modal js-modal">
        <div class="modal-bg js-modal-close">
        </div>
        <div class="modal-content">
          <p class="modal-text">本当にPart3の問題をリセットしてもよろしいですか？<br>
            注意：この操作は取り消すことができません。
          </p>
          <a href="#" class="js-modal-close">キャンセル</a>
          <a href="#" class="delete" id="part3">リセットする</a>
        </div>
      </div>



      <div id="modal04" class="modal js-modal">
        <div class="modal-bg js-modal-close">
        </div>
        <div class="modal-content">
          <p class="modal-text">本当にpart4の問題をリセットしてもよろしいですか？<br>
            注意：この操作は取り消すことができません。
          </p>
          <a href="#" class="js-modal-close">キャンセル</a>
          <a href="#" class="delete" id="part4">リセットする</a>
        </div>
      </div>


      <div id="modal04" class="modal js-modal">
        <div class="modal-bg js-modal-close">
        </div>
        <div class="modal-content">
          <p class="modal-text">本当にpart5の問題をリセットしてもよろしいですか？<br>
            注意：この操作は取り消すことができません。
          </p>
          <a href="#" class="js-modal-close">キャンセル</a>
          <a href="#" class="delete" id="part5">リセットする</a>
        </div>
      </div>


      <div id="modal04" class="modal js-modal">
        <div class="modal-bg js-modal-close">
        </div>
        <div class="modal-content">
          <p class="modal-text">本当にpart6の問題をリセットしてもよろしいですか？<br>
            注意：この操作は取り消すことができません。
          </p>
          <a href="#" class="js-modal-close">キャンセル</a>
          <a href="#" class="delete" id="part6">リセットする</a>
        </div>
      </div>


      <div id="modal04" class="modal js-modal">
        <div class="modal-bg js-modal-close">
        </div>
        <div class="modal-content">
          <p class="modal-text">本当に全ての問題をリセットしてもよろしいですか？<br>
            注意：この操作は取り消すことができません。
          </p>
          <a href="#" class="js-modal-close">キャンセル</a>
          <a href="#" class="delete" id="all">リセットする</a>
        </div>
      </div>



      <!--ログアウト-->
      <div id="panel3" class="tab_panel3">
        <a class="button" href="http://localhost/logout" 
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          ログアウト
        </a>
      </div>



    </div>
  </div>
  </div>
</center>
<script type="module">
  // mail
  $(function() {
    $("#update").on("click", function(event) {
      let email = $("#email").val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/edit_account",
        data: {
          "email": email
        },
        dataType: "text",
        beforeSend: function() {
          $("#overlay").fadeIn(300);
        }
      }).done(function(data) {
        setTimeout(function() {
          $("#overlay").fadeOut(300);
        }, 500);
        $('#modalArea').fadeIn();
      }).fail(function(XMLHttpRequest, status, e) {
        alert('更新に失敗しました。');
        alert(e);
      });
    });
  });

  // part削除
  $(function() {
    $(".delete").on("click", function(event) {
      let part = event.target.id;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/delete",
        data: {
          "part": part
        },
        dataType: "text",
        beforeSend: function() {
          $("#overlay").fadeIn(300);
        }
      }).done(function(data) {
        setTimeout(function() {
          $("#overlay").fadeOut(300);
        }, 500);
        $('#modalArea').fadeIn();
      }).fail(function(XMLHttpRequest, status, e) {
        alert('更新に失敗しました。');
        alert(e);
      });
    });
  });
  //閉じるボタンをクリックしたらモーダルを閉じる
  $('#closeModal , #modalBg').click(function() {
    // window.location.href = '/config';
    $('#modalArea').fadeOut();
    $('#modal02').fadeOut();
  });
</script>

@endsection