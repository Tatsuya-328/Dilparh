<template>
  <div>
    <div v-if="!completed">
      <!-- 事前に画像読み込み -->
      <div style="display:none">
        <img :src="'/image/teacher1_new.png'" />
        <img :src="'/image/home_button.png'" />
        <img :src="'/image/home_button2.png'" />
        <img :src="'/image/next_button.png'" />
        <img :src="'/image/next_button2.png'" />
        <img :src="'/image/correct_button.png'" />
        <img :src="'/image/correct_button2.png'" />
        <img :src="'/image/wrong_button.png'" />
        <img :src="'/image/wrong_button2.png'" />
      </div>

      <!--クイズを表示する部分-->
      <div class="word_and_symbol">
        <h1>{{ currentWord.word_urdu }}</h1>
        <h6>[{{ currentWord.pron }}]</h6>
      </div>

      <div class="item_wrapper">
        <div class="item">
          <button
            type="button"
            @click="addAnswer(currentWord.japanese)"
          >
            {{ currentWord.japanese }}
          </button>
        </div>
        <div class="item">
          <button
            type="button"
            @click="addAnswer(randomWord1.japanese)"
          >
            {{ randomWord1.japanese }}
          </button>
        </div>
        <div class="item">
          <button
            type="button"
            @click="addAnswer(randomWord2.japanese)"
          >
            {{ randomWord2.japanese }}
          </button>
        </div>
        <div class="item">
          <button
            type="button"
            @click="addAnswer(randomWord3.japanese)"
          >
            {{ randomWord3.japanese }}
          </button>
        </div>
      </div>
      <!-- やめるボタン-->
      <div class="button exit_button">
        <a
          href="#"
          onclick="window.history.back(); return false;"
        >
          <input
            type="image"
            :src="'/image/stop.png'"
            :onmouseover="'this.src=' + '\'' + '/image/stop2.png' + '\''"
            :onmouseout="'this.src=' + '\'' + '/image/stop.png' + '\''"
          >
        </a>
      </div>
    </div>

    <!-- 誤答のみ表示 -->
    <div v-else-if="show_wrong">
      <div class="answer wrong">
        <h2 class="collect_answer">
          誤答：<b>{{ this.words.length - correct }}</b>
        </h2>
      </div>
      <div
        v-for="(word_id, index) in this.words"
        :key="word_id.word_id"
      >
              <!-- 音声ファイル読み込み -->
        <audio
          :id='"audio" + word_id.word_id'
          preload="auto"
        >
          <source
            :src='"/audio/" + word_id.word_id + ".mp3"'
            type="audio/mp3"
          >
        </audio>
        <div
          class="textbox"
          v-if="word_id.japanese != answers[index]"
        >
          <div class="whole-contents-wrapper_wrong">
            <!-- <article>
              <h2 class="answer-text2" v-if="word_id.japanese == answers[index]">
                〇
              </h2>
              <h2 class="answer-text3" v-else>×</h2>
            </article> -->

            <aside>
              <div class="answer-wrapper">
                <img
                  :src="'/image/voice.png'"
                  v-on:click="ring(word_id.word_id);"
                  alt=""
                  class="voice"
                />
                <h2 class="answer-text">
                  {{ index + 1 }}.
                  {{ word_id.word_urdu }}　[{{
                                        word_id.pron
                                    }}]：{{ word_id.japanese }}
                </h2>
              </div>
              <div class="answer-wrapper">
                <img
                  :src="'/image/voice.png'"
                  alt=""
                  class="voice2"
                />
                <h6 class="example-text">اسلام علیکم، والیکم اسلام（例文）<br>
                  （訳）こんにちは、こんにちは</h6>
              </div>
            </aside>
          </div>
        </div>
      </div>

      <!--先生の画像-->
      <div class="teachermessage">
        <div class="balloon2-right box1">
          <p>
            今回は{{ this.words.length - correct }}問ミスだ！{{ this.words.length - correct }}問ミスしたということは<br>
            {{ correct }}問正解したということだ！<br>
            気を落とさずに引き続き頑張りたまえ！<br>
          </p>
          <p class="byteacher">
            by ウルドゥー先生
          </p>

        </div>
        <div class="box2">
          <img
            :src="'/image/teacher1_new.png'"
            alt=""
            class="teacher lazyload"
          />
        </div>
      </div>

      <!--ボタン-->
      <div class="button-area">

        <input
          onclick="location.href='/'"
          type="image"
          name="test"
          :src="'/image/home_button.png'"
          :onmouseover="'this.src=' + '\'' + '/image/home_button2.png' + '\''"
          :onmouseout="'this.src=' + '\'' + '/image/home_button.png' + '\''"
        />

        <input
          id="top"
          @click="show_wrong_btn"
          type="image"
          name="test"
          :src="'/image/correct_button.png'"
          :onmouseover="'this.src=' + '\'' + '/image/correct_button2.png' + '\''"
          :onmouseout="'this.src=' + '\'' + '/image/correct_button.png' + '\''"
        />

        <input
          onclick="window.history.back(); return false;"
          type="image"
          name="test"
          :src="'/image/next_button.png'"
          :onmouseover="'this.src=' + '\'' + '/image/next_button2.png' + '\''"
          :onmouseout="'this.src=' + '\'' + '/image/next_button.png' + '\''"
        />

      </div>
    </div>
    <!-- 誤答のみ表示ここまで -->

    <!-- 全ての結果 -->
    <div v-else-if="!show_wrong">
      <div class="answer">
        <h2 class="collect_answer">
          正答：<b>{{ correct }}</b> /{{ this.words.length }}
        </h2>
      </div>
      <!--真ん中の要素ここに問題の正誤が表示される-->
      <div
        v-for="(word_id, index) in this.words"
        :key="word_id.word_id"
      >
        <!-- 音声ファイル読み込み -->
        <audio
          :id='"audio" + word_id.word_id'
          preload="auto"
        >
          <source
            :src='"/audio/" + word_id.word_id + ".mp3"'
            type="audio/mp3"
          >
        </audio>
        <!-- 単語 -->
        <div class="textbox">
          <div class="whole-contents-wrapper">
            <article>
              <h2
                class="answer-text2"
                v-if="word_id.japanese == answers[index]"
              >
                〇
              </h2>
              <h2
                class="answer-text3"
                v-else
              >×</h2>
            </article>
            <aside>
              <div class="answer-wrapper">
                <img
                  :src="'/image/voice.png'"
                  v-on:click="ring(word_id.word_id);"
                  alt=""
                  class="voice"
                />
                <h2 class="answer-text">
                  {{ index + 1 }}.
                  {{ word_id.word_urdu }}　[{{
                                        word_id.pron
                                    }}]：{{ word_id.japanese }}
                </h2>
              </div>
              <div class="answer-wrapper">
                <img
                  :src="'/image/voice.png'"
                  alt=""
                  class="voice2"
                />
                <h6 class="example-text">اسلام علیکم، والیکم اسلام（例文）<br>
                  （訳）こんにちは、こんにちは</h6>
              </div>
            </aside>
          </div>
        </div>
      </div>

      <!--先生の画像-->
      <div class="teachermessage">
        <div class="balloon2-right box1">
          <p>
            今回は{{ this.words.length - correct }}問ミスだ！{{ this.words.length - correct }}問ミスしたということは<br>
            {{ correct }}問正解したということだ！<br>
            気を落とさずに引き続き頑張りたまえ！<br>
          </p>
          <p class="byteacher">
            by ウルドゥー先生
          </p>

        </div>
        <div class="box2">
          <img
            :src="'/image/teacher1_new.png'"
            alt=""
            class="teacher lazyload"
          />
        </div>
      </div>

      <!--ボタン-->
      <div class="button-area">

        <input
          onclick="location.href='/'"
          type="image"
          name="test"
          :src="'/image/home_button.png'"
          :onmouseover="'this.src=' + '\'' + '/image/home_button2.png' + '\''"
          :onmouseout="'this.src=' + '\'' + '/image/home_button.png' + '\''"
        />

        <input
          id="top"
          @click="show_wrong_btn"
          type="image"
          name="test"
          :src="'/image/wrong_button.png'"
          :onmouseover="'this.src=' + '\'' + '/image/wrong_button2.png' + '\''"
          :onmouseout="'this.src=' + '\'' + '/image/wrong_button.png' + '\''"
        />

        <input
          onclick="window.history.back(); return false;"
          type="image"
          name="test"
          :src="'/image/next_button.png'"
          :onmouseover="'this.src=' + '\'' + '/image/next_button2.png' + '\''"
          :onmouseout="'this.src=' + '\'' + '/image/next_button.png' + '\''"
        />

      </div>
    </div>
    <!-- 全ての結果ここまで -->
  </div>
</template>

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.min.js"></script>
<script>
function shuffleContent(container) {
  var content = $(".item_wrapper").find("> *");
  var total = content.length;
  content.each(function () {
    content.eq(Math.floor(Math.random() * total)).prependTo(container);
  });
}

// クイズをシャッフル
$(function () {
  shuffleContent($(".item_wrapper"));
});

export default {
  name: "SampleComponent",
  props: {
    words: {
      type: Array,
      default: [],
    },
    dummywords: {
      type: Array,
      default: [],
    },
    user_id: {
      type: null,
    },
  },
  data() {
    return {
      errors: [],
      answers: [], // クイズ最後の回答表示用
      sendanswers: [], // DB登録用
      correct: 0,
      questionIndex: 0,
      random1: Math.floor(Math.random() * this.dummywords.length),
      random2: Math.floor(Math.random() * this.dummywords.length),
      random3: Math.floor(Math.random() * this.dummywords.length),
      show_wrong: false,
      show_correct: false,
    };
  },
  methods: {
    addAnswer: function (answerdjapanese) {
      // 回答表示画面用にpush
      this.answers.push(answerdjapanese);
      if (answerdjapanese === this.currentWord.japanese) {
        // 正解時のDB登録用配列
        if (
          this.words[this.questionIndex].correct ===
            this.words[this.questionIndex].japanese &&
          this.words[this.questionIndex].liseted != "1"
        ) {
          // 初めての出題
          const answerd = {
            users_id: this.user_id,
            words_id: this.currentWord.word_id,
            correct: 1,
            wrong: 0,
          };
          this.sendanswers.push(answerd);
        } else if (
          this.words[this.questionIndex].correct ===
          this.words[this.questionIndex].japanese
        ) {
          // リセット済み
          const answerd = {
            answers_id: this.currentWord.answers_id,
            users_id: this.user_id,
            words_id: this.currentWord.word_id,
            correct: 1,
            wrong: 0, // 正解したら不正解記録削除
          };
          this.sendanswers.push(answerd);
        } else {
          // ただの既出
          const answerd = {
            answers_id: this.currentWord.answers_id,
            users_id: this.user_id,
            words_id: this.currentWord.word_id,
            correct: Number(this.words[this.questionIndex].correct) + 1,
            wrong: 0, // 正解したら不正解記録削除
          };

          this.sendanswers.push(answerd);
        }
        this.correct++;
      } else {
        // 不正解時のDB登録用配列
        if (
          this.words[this.questionIndex].correct ===
            this.words[this.questionIndex].japanese &&
          this.words[this.questionIndex].liseted != "1"
        ) {
          // 初めての出題
          const answerd = {
            users_id: this.user_id,
            words_id: this.currentWord.word_id,
            correct: 0,
            wrong: 1,
          };
          this.sendanswers.push(answerd);
        } else if (
          this.words[this.questionIndex].correct ===
          this.words[this.questionIndex].japanese
        ) {
          // リセットされた単語
          const answerd = {
            answers_id: this.currentWord.answers_id,
            users_id: this.user_id,
            words_id: this.currentWord.word_id,
            correct: 1,
            wrong: 1, // 不正解はフラグとして使うから数を増やさない
          };
          this.sendanswers.push(answerd);
        } else {
          // ただの既出
          const answerd = {
            answers_id: this.currentWord.answers_id,
            users_id: this.user_id,
            words_id: this.currentWord.word_id,
            correct: this.words[this.questionIndex].correct,
            wrong: 1, // 不正解はフラグとして使うから数を増やさない
          };
          this.sendanswers.push(answerd);
        }
      }
      // 画面切り替え時に選択肢の順番をシャッフル
      function shuffleContent(container) {
        var content = container.find("> *");
        var total = content.length;
        content.each(function () {
          content.eq(Math.floor(Math.random() * total)).prependTo(container);
        });
      }
      $(function () {
        shuffleContent($(".item_wrapper"));
      });
      // 画面切り替え時に誤答選択肢を新しくする
      this.random1 = Math.floor(Math.random() * this.dummywords.length);
      this.random2 = Math.floor(Math.random() * this.dummywords.length);
      while (this.random2 === this.random1) {
        this.random2 = Math.floor(Math.random() * this.dummywords.length);
      }
      this.random3 = Math.floor(Math.random() * this.dummywords.length);
      while (this.random3 === this.random1 || this.random3 === this.random2) {
        this.random3 = Math.floor(Math.random() * this.dummywords.length);
      }

      // } else {
      // 最終問題に答えたときにDB登録
      // for (var i = 0; i < this.sendanswers.length; i++) {
      // 同時にwordsをループさせて、correctとwrongが入ってるか確認する。
      if (
        this.words[this.questionIndex].correct ==
          this.words[this.questionIndex].japanese &&
        this.words[this.questionIndex].liseted != "1"
      ) {
        // 初めての回答なら登録
        console.log(this.sendanswers[this.questionIndex]);
        axios.post("/api/answers", this.sendanswers[this.questionIndex]);
      } else {
        // 既出なら更新
        axios.put(
          "/api/answers/" +
            this.sendanswers[this.questionIndex]["answers_id"] +
            "/" +
            this.sendanswers[this.questionIndex]["correct"] +
            "/" +
            this.sendanswers[this.questionIndex]["wrong"] +
            "/report"
        );

        // axios.put("/api/answers", this.sendanswers[i]);
      }
      // }

      if (!this.completed) {
        this.questionIndex++;
      }
    },
    show_wrong_btn: function () {
      this.show_wrong = !this.show_wrong;
      // if (this.completed) {
      //     this.completed = !this.completed;
      // }
      $(window).scrollTop(0);
    },
    show_correct_btn: function () {
      this.show_correct = !this.show_correct;
      // if (this.completed) {
      //     this.completed = !this.completed;
      // }
      if (this.show_wrong == true) {
        this.show_wrong = false;
      }
      $(window).scrollTop(0);
    },
    finish_btn: function () {},
    // 音声再生
    ring: function (id) {
      document.getElementById("audio" + id).play();
    },
  },
  computed: {
    currentWord: function () {
      return this.words[this.questionIndex];
    },
    randomWord1: function () {
      return this.dummywords[this.random1];
    },
    randomWord2: function () {
      return this.dummywords[this.random2];
    },
    randomWord3: function () {
      return this.dummywords[this.random3];
    },
    completed: function () {
      return this.words.length == this.answers.length;
    },
  },
};
// シャッフルが終わってから表示させる
// document.getElementsByClassName("item_wrapper").style.visibility ="visible";
</script>