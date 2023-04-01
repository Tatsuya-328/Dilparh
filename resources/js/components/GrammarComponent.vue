<template>
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
                    <li id="item1" class="answer" ref="answer" draggable="true"></li>
                    <li id="item2" class="answer" ref="answer" draggable="true"></li>
                    <li id="item3" class="answer" ref="answer" draggable="true"></li>
                    <li id="item4" class="answer" ref="answer" draggable="true"></li>
                    <li id="item5" class="answer" ref="answer" draggable="true"></li>
                    <li id="item6" class="answer" ref="answer" draggable="true"></li>
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

    </div>
</template>

<script>
//  並び替え
$( function() {
  var answerUL = document.getElementById("answer-area");
  // $( '#answer-area' ).sortable();
  answerUL.sortable();
  $( '#answer-area' ).disableSelection();
} );

    export default {
        mounted() {
            console.log('Component mounted.');
            const targetElementText = this.$refs.answer;
            console.log('対象のDOMのテキスト：', targetElementText);
        }
    }



    // //以下 grammar.jsから移行
    // const question = [
    // {
    //     q: "パキスタンに行くつもりだよ",
    //     a: ["۔", "ہے", "ارادہ", "کا", "جانے", "پاکستان"]
    // },
    // {
    //     q: "私はその公園に行きます",
    //     a: ["I", "will", "go", "to", "the", "park"]
    // },
    // {
    //     q: "北海道は何マイル離れていますか",
    //     a: ["how", "many", "miles", "away", "is", "Hokkaido"]
    // },
    // {
    //     q: "一列に並んでください",
    //     a: ["please", "line", "up", "in", "a", "row"]
    // }
    // ];

    // //top画面

    // //game画面
    // const scecegame = document.querySelector("#game");
    // //正解不正解表示画面
    // const next = document.querySelector("#next");
    // const field = document.querySelector("#field");
    // const select = document.querySelectorAll(".select");
    // const answer = document.querySelectorAll(".answer");

    // //選択された答えを順番に格納
    // let answers = [];
    // //問題番号を管理
    // let questionnum = 0;


    // init();
    // function init() {

    // gamestart();
    // }

    // function changescene(hiddenscene, visiblescene) {
    // hiddenscene.classList.add("is-hidden");
    // hiddenscene.classList.remove("is-visible");
    // visiblescene.classList.add("is-visible");
    // }

    // function gamestart() {

    // showQuestion()
    // }

    // //並べ替えクイズの処理
    // function showQuestion() {
    // //答えを格納している配列を初期化
    // answers.length = 0; 
    // for (let i = 0; i < 6; i++) {
    //     console.log( answer );
    //     answer[i].textContent = null;
    // }

    // //問題の解答シャッフル Fisher–Yatesアルゴリズムを用いる
    // //値渡しコピーで配列に代入
    // let shufflea = question[questionnum].a.concat(); 
    // for (let i = shufflea.length - 1; i > 0; i--) {
    //     let r = Math.floor(Math.random() * (i + 1));
    //     let tmp = shufflea[i];
    //     shufflea[i] = shufflea[r];
    //     shufflea[r] = tmp;
    // }

    // //問題文挿入
    // //回答選択肢挿入
    // for (let i = 0; i < shufflea.length; i++) {
    //     select[i].classList.remove('is-hidden');
    //     select[i].textContent = shufflea[i];
    // }

    // let count = 0;
    // //選択された答えを消す 
    // for (let i = 0; i < shufflea.length; i++) {
    //     select[i].onclick = () => {
    //         console.log(count);
    //         select[i].classList.add('is-hidden');
    //         //選択された答えを移動
    //         answer[count].textContent = select[i].textContent;

    //         count += 1;
    //         if (count == shufflea.length) {
    //             count = 0;
    //         }
    //     }
    // }

    // }

    // // 回答する
    // function checkAnswer() {
    // for (let i = 0; i < document.getElementsByClassName( "answer" ).length; i++) {
    //     answers.push(document.getElementsByClassName( "answer" )[i].innerText);
    // }
    // Judgment();
    // }

    // //正解かどうか判定
    // function Judgment() {
    // changescene(scecegame, next);
    // if (JSON.stringify(question[questionnum].a) == JSON.stringify(answers)) {
    //     next.innerHTML = "<p style='font-size:3em;color:#f00;'>正解です！!</p><button onclick='nextquestion()'>次の問題</button>";

    // } else {
    //     next.innerHTML = "<p style='font-size:3em;color:#000;'>不正解...</p><button onclick='nextquestion()'>次の問題</button>";
    // }
    // // 元の順番に戻す
    // var answerUL = document.getElementById("answer-area");
    // var answer_array = Array.from(document.getElementsByClassName("answer"));
    //     function compareText (a,b) {
    //     if (a.id > b.id)
    //         return 1;
    //     else if (a.id < b.id)
    //         return -1;
    //     return 0;
    //     }
    //     answer_array.sort(compareText);
    //     // 新しい順番を DOM ツリーに反映
    //     for (var i=0; i<answer_array.length; i++) {
    //     answerUL.appendChild(answerUL.removeChild(answer_array[i]))
    //     }
    // }
    // //次の問題ボタンが押された時の処理
    // function nextquestion() {
    // questionnum++
    // if (Object.keys(question).length > questionnum) {
    //     changescene(next, scecegame);
    //     showQuestion();
    // } else {
    //     questionnum = 0;
    //     changescene(next, scecegame);
    //     showQuestion();
    // }

    // }

    // //  並び替え
    // $( function() {
    // $( '#answer-area' ).sortable();
    // $( '#answer-area' ).disableSelection();
    // } );


</script>
