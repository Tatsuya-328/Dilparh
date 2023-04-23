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
              <draggable v-model="items" item-key="no" tag="ul">
                <template #item="{ element, index }">
                  <li>{{element.name}}-(No.{{element.no}})</li>
                </template>
              </draggable>
          </div>

          <!-- <ul class="drag-list">
            <li id="item1" draggable="true">1.ドラッグ＆ドロップで</li>
            <li id="item2" draggable="true">2.リストの順番が</li>
            <li id="item3" draggable="true">3.入れ替わります</li>
          </ul> -->


          <div id="btn" class="grammar_quiz_btn">
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

<!-- <script type="text/javascript" src="main.js"></script> -->
<script>
const draggable = window['vuedraggable'];

export default {
  // name: "SampleComponent",
  // props: {
  //   words: {
  //     type: Array,
  //     default: [],
  //   },
  //   dummywords: {
  //     type: Array,
  //     default: [],
  //   },
  //   user_id: {
  //     type: null,
  //   },
  // },
  data() {
    return {
      items: [
        {no:1, name:'キャベツ', categoryNo:'1'},
        {no:2, name:'ステーキ', categoryNo:'2'},
        {no:3, name:'リンゴ', categoryNo:'3'}
      ],
      question: [
        {
            q: "パキスタンに行くつもりだよ",
            a: ["۔", "ہے", "ارادہ", "کا", "جانے", "پاکستان"]
        },
        {
            q: "今日は授業がないみたいです",
            a: ["ہے۔", "نہیں", "کلاس", "آج", "ہے", "لگتا"]
        },
        {
            q: "あなたの名前を教えてください",
            a: ["بتائیں", "نام", "اپنا", "مجھے", "کرم", "براہِ"]
        },
      ],
      //game画面
      scecegame: document.querySelector("#game"),
      //正解不正解表示画面
      next: document.querySelector("#next"),
      field: document.querySelector("#field"),
      select: document.querySelectorAll(".select"),
      answer: document.querySelectorAll(".answer"),
      //選択された答えを順番に格納
      answers: [],
      //問題番号を管理
      questionnum: 0,
      
      // errors: [],
      // answers: [], // クイズ最後の回答表示用
      // sendanswers: [], // DB登録用
      // correct: 0,
      // questionIndex: 0,
      // random1: Math.floor(Math.random() * this.dummywords.length),
      // random2: Math.floor(Math.random() * this.dummywords.length),
      // random3: Math.floor(Math.random() * this.dummywords.length),
      // show_wrong: false,
      // show_correct: false,
    };
  },
  components: {
    draggable: draggable
  },
  methods: {


    
  //   rings: function (id) {
  //     // console.log('一問目');
  //     // 音声再生、一問目のみ用
  //     // document.getElementById("preaudio" + id).muted = false;
  //   },
  //   addAnswer: function (answerdjapanese) {
  //     // 回答表示画面用にpush
  //     this.answers.push(answerdjapanese);
  //     if (answerdjapanese === this.currentWord.japanese) {
  //       // 正解時のDB登録用配列
  //       if (
  //         this.words[this.questionIndex].correct ===
  //           this.words[this.questionIndex].japanese &&
  //         this.words[this.questionIndex].liseted != "1"
  //       ) {
  //         // 初めての出題
  //         const answerd = {
  //           users_id: this.user_id,
  //           words_id: this.currentWord.word_id,
  //           correct: 1,
  //           wrong: 0,
  //         };
  //         this.sendanswers.push(answerd);
  //       } else if (
      //     this.words[this.questionIndex].correct ===
      //     this.words[this.questionIndex].japanese
      //   ) {
      //     // リセット済み
      //     const answerd = {
      //       answers_id: this.currentWord.answers_id,
      //       users_id: this.user_id,
      //       words_id: this.currentWord.word_id,
      //       correct: 1,
      //       wrong: 0, // 正解したら不正解記録削除
      //     };
      //     this.sendanswers.push(answerd);
      //   } else {
      //     // ただの既出
      //     const answerd = {
      //       answers_id: this.currentWord.answers_id,
      //       users_id: this.user_id,
      //       words_id: this.currentWord.word_id,
      //       correct: Number(this.words[this.questionIndex].correct) + 1,
      //       wrong: 0, // 正解したら不正解記録削除
      //     };

      //     this.sendanswers.push(answerd);
      //   }
      //   this.correct++;
      // } else {
      //   // 不正解時のDB登録用配列
      //   if (
      //     this.words[this.questionIndex].correct ===
      //       this.words[this.questionIndex].japanese &&
      //     this.words[this.questionIndex].liseted != "1"
      //   ) {
      //     // 初めての出題
      //     const answerd = {
      //       users_id: this.user_id,
      //       words_id: this.currentWord.word_id,
      //       correct: 0,
      //       wrong: 1,
        //   };
        //   this.sendanswers.push(answerd);
        // } else if (
        //   this.words[this.questionIndex].correct ===
        //   this.words[this.questionIndex].japanese
        // ) {
        //   // リセットされた単語
        //   const answerd = {
        //     answers_id: this.currentWord.answers_id,
        //     users_id: this.user_id,
        //     words_id: this.currentWord.word_id,
        //     correct: 1,
        //     wrong: 1, // 不正解はフラグとして使うから数を増やさない
        //   };
        //   this.sendanswers.push(answerd);
        // } else {
        //   // ただの既出
      //     const answerd = {
      //       answers_id: this.currentWord.answers_id,
      //       users_id: this.user_id,
      //       words_id: this.currentWord.word_id,
      //       correct: this.words[this.questionIndex].correct,
      //       wrong: 1, // 不正解はフラグとして使うから数を増やさない
      //     };
      //     this.sendanswers.push(answerd);
      //   }
      // }
      // // 画面切り替え時に選択肢の順番をシャッフル
      // function shuffleContent(container) {
      //   var content = container.find("> *");
      //   var total = content.length;
      //   content.each(function () {
      //     content.eq(Math.floor(Math.random() * total)).prependTo(container);
      //   });
      // }
      // $(function () {
      //   shuffleContent($(".item_wrapper"));
      // });
      // // 画面切り替え時に誤答選択肢を新しくする
      // this.random1 = Math.floor(Math.random() * this.dummywords.length);
      // this.random2 = Math.floor(Math.random() * this.dummywords.length);
      // while (this.random2 === this.random1) {
      //   this.random2 = Math.floor(Math.random() * this.dummywords.length);
      // }
      // this.random3 = Math.floor(Math.random() * this.dummywords.length);
      // while (this.random3 === this.random1 || this.random3 === this.random2) {
      //   this.random3 = Math.floor(Math.random() * this.dummywords.length);
      // }

      // // } else {
      // // 最終問題に答えたときにDB登録
      // // for (var i = 0; i < this.sendanswers.length; i++) {
      // // 同時にwordsをループさせて、correctとwrongが入ってるか確認する。
      // if (
      //   this.words[this.questionIndex].correct ==
      //     this.words[this.questionIndex].japanese &&
      //   this.words[this.questionIndex].liseted != "1"
      // ) {
      //   // 初めての回答なら登録
      //   axios.post("/api/answers", this.sendanswers[this.questionIndex]);
      // } else {
      //   // 既出なら更新
      //   axios.put(
      //     "/api/answers/" +
      //       this.sendanswers[this.questionIndex]["answers_id"] +
      //       "/" +
      //       this.sendanswers[this.questionIndex]["correct"] +
      //       "/" +
      //       this.sendanswers[this.questionIndex]["wrong"] +
      //       "/report"
      //   );

      //   // axios.put("/api/answers", this.sendanswers[i]);
      // }
      // // }
      // if (!this.completed) {
      //   this.questionIndex++;
      //   // 音声再生二問目以降
      //   console.log("二回目");
      //   for (let i = 0; i < 10; i++) {
    //       console.log(this.words[i]["word_id"]);
    //       document.getElementById("audio" + this.words[i]["word_id"]).pause();
    //     }
    //     document.getElementById("audio" + this.currentWord["word_id"]).play();
    //   }
    // },
    // show_wrong_btn: function () {
    //   this.show_wrong = !this.show_wrong;
    //   // if (this.completed) {
    //   //     this.completed = !this.completed;
    //   // }
    //   $(window).scrollTop(0);
    // },
    // show_correct_btn: function () {
    //   this.show_correct = !this.show_correct;
    //   // if (this.completed) {
    //   //     this.completed = !this.completed;
    //   // }
    //   if (this.show_wrong == true) {
    //     this.show_wrong = false;
    //   }
    //   $(window).scrollTop(0);
    // },
    // finish_btn: function () {},
    // // 音声再生ボタン押したら
    // ring: function (id) {
    //   // console.log("audio" + (id - 1));
    //   // 再生中のものは停止してから
    //   for (let i = 0; i < 10; i++) {
    //     console.log(this.words[i]["word_id"]);
    //     document.getElementById("audio" + this.words[i]["word_id"]).pause();
    //   }
    //   document.getElementById("audio" + id).pause();
    //   document.getElementById("audio" + id).play();
    // },
  },
  computed: {
    // currentWord: function () {
    //   return this.words[this.questionIndex];
    // },
    // firstWord: function () {
    //   return this.words[0];
    // },
    // randomWord1: function () {
    //   return this.dummywords[this.random1];
    // },
    // randomWord2: function () {
    //   return this.dummywords[this.random2];
    // },
    // randomWord3: function () {
    //   return this.dummywords[this.random3];
    // },
    // completed: function () {
    //   return this.words.length == this.answers.length;
    // },
    // rings: function () {
    //   alert(this.words[this.questionIndex].word_id);
    //   document
    //     .getElementById("audio" + this.words[this.questionIndex].word_id)
    //     .play();
    //   return null;
    // },
    // ring: function (id) {
    //   // alert(this.words[this.questionIndex].word_id);
    //   document
    //     .getElementById("audio" + id)
    //     .play();
    //   return null;
    // },
  },
  mounted: function () {
    // console.dir(this.words[0]);
    // alert(this.words[0][0]);
    // alert(this.words['words_id']);
    // var promise = document
    //   .getElementById("preaudio" + this.words[0]["word_id"])
    //   .play();
    // if (promise !== undefined) {
    //   promise
    //     .then((_) => {
    //       // Autoplay started!
    //     })
    //     .catch((error) => {
    //       alert('hoge');
    //       // document.getElementById("audio" + this.words[0]['word_id']).muted = false;
    //       // document.getElementById("audio" + this.words[0]['word_id']).play();
    //       // document.getElementById("audio_start").click();
    //       // Autoplay was prevented.
    //       // Show a "Play" button so that user can start playback.
    //     });
    // }
  },

  // watch: {
  //   rings: function() {
  //     // alert(this.words[this.questionIndex].word_id);
  //     return document.getElementById("audio" + this.currentWord.word_id).play();
  //   }
  // }
};
// シャッフルが終わってから表示させる
// document.getElementsByClassName("item_wrapper").style.visibility ="visible";
</script>
