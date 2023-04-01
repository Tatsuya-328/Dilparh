//問題
const question = [
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
];

//top画面
// const scenetop = document.querySelector("#start");
//game画面
const scecegame = document.querySelector("#game");
//正解不正解表示画面
const next = document.querySelector("#next");
const field = document.querySelector("#field");
const select = document.querySelectorAll(".select");
const answer = document.querySelectorAll(".answer");

//選択された答えを順番に格納
let answers = [];
//問題番号を管理
let questionnum = 0;


init();
function init() {
  // changescene(scecegame, scenetop);
  // scenetop.addEventListener('click', gamestart, false);
  gamestart();
}

function changescene(hiddenscene, visiblescene) {
  hiddenscene.classList.add("is-hidden");
  hiddenscene.classList.remove("is-visible");
  visiblescene.classList.add("is-visible");
}

function gamestart() {
  // changescene(scenetop, scecegame);
  showQuestion()
}

//並べ替えクイズの処理
function showQuestion() {
  //答えを格納している配列を初期化
  answers.length = 0; 
  for (let i = 0; i < 6; i++) {
      answer[i].textContent = null;
  }

  //問題の解答シャッフル Fisher–Yatesアルゴリズムを用いる
  //値渡しコピーで配列に代入
  let shufflea = question[questionnum].a.concat(); 
  for (let i = shufflea.length - 1; i > 0; i--) {
      let r = Math.floor(Math.random() * (i + 1));
      let tmp = shufflea[i];
      shufflea[i] = shufflea[r];
      shufflea[r] = tmp;
  }

  //問題文挿入
  // document.querySelector("h1").textContent = question[questionnum].q;
  // document.getElementById("question_title").innerText = question[questionnum].q;
  //回答選択肢挿入
  for (let i = 0; i < shufflea.length; i++) {
      select[i].classList.remove('is-hidden');
      select[i].textContent = shufflea[i];
  }

  let count = 0;
  //選択された答えを消す 
  for (let i = 0; i < shufflea.length; i++) {
      select[i].onclick = () => {
          console.log(count);
          select[i].classList.add('is-hidden');
          //選択された答えを移動
          answer[count].textContent = select[i].textContent;
          // answers.push(answer[count].textContent);
          count += 1;
          if (count == shufflea.length) {
              count = 0;
              // Judgment();
          }
      }
  }

  // let reset_count = 0;
  // //選択した回答を未回答に戻す 
  // for (let i = 0; i < shufflea.length; i++) {
  //   answer[i].onclick = () => {
  //       console.log(reset_count);
  //       answer[i].classList.add('is-hidden');
  //       //選択された答えを移動
  //       select[i].classList.remove('is-hidden');

  //       answer[reset_count].textContent = i;
        // answers.push(answer[count].textContent);
        // reset_count += 1;
        // if (reset_count == shufflea.length) {
        //   reset_count = 0;
        //     // Judgment();
        // }
    // }
// }
}

// document.getElementsByClassName( "answer" )[0].innerText;
// document.getElementsByClassName( "answer" )[0].length;
// 回答する
function checkAnswer() {
  for (let i = 0; i < document.getElementsByClassName( "answer" ).length; i++) {
    answers.push(document.getElementsByClassName( "answer" )[i].innerText);
  }
  Judgment();
}

//正解かどうか判定
function Judgment() {
  let showinganswer = question[questionnum].a.reverse().join(" ");
  // showinganswer.replace(",", " ");
  console.log(showinganswer);
  changescene(scecegame, next);
  if (JSON.stringify(question[questionnum].a) == JSON.stringify(answers)) {
    console.log(question[questionnum].a);
      next.innerHTML = "<p style='font-size:3em;color:#f00;'>" +  "正解です！!" + "</p><p>答え: " + showinganswer + "</p><p>" + question[questionnum].q + "</p><button onclick='nextquestion()'>次の問題</button>";

  } else {
      next.innerHTML = "<p style='font-size:3em;color:#000;'>" + "不正解..." + "</p><p>答え: " + showinganswer + "</p><p>" + question[questionnum].q + "</p><button onclick='nextquestion()'>次の問題</button>";
  }
   // 元の順番に戻す
  var answerUL = document.getElementById("answer-area");
  var answer_array = Array.from(document.getElementsByClassName("answer"));
    function compareText (a,b) {
      if (a.id > b.id)
          return 1;
      else if (a.id < b.id)
          return -1;
      return 0;
      }
    answer_array.sort(compareText);
    // 新しい順番を DOM ツリーに反映
    for (var i=0; i<answer_array.length; i++) {
      answerUL.appendChild(answerUL.removeChild(answer_array[i]))
    }
}
//次の問題ボタンが押された時の処理
function nextquestion() {
  questionnum++
  if (Object.keys(question).length > questionnum) {
      changescene(next, scecegame);
      showQuestion();
  } else {
      questionnum = 0;
      changescene(next, scecegame);
      showQuestion();
  }
  // document.getElementsByClassName( "answer" ).sort();
}

//  並び替え
$( function() {
  $( '#answer-area' ).sortable();
  $( '#answer-area' ).disableSelection();
} );

// document.querySelectorAll('.drag-list li').forEach (elm => {
// 	elm.ondragstart = function () {
// 		event.dataTransfer.setData('text/plain', event.target.id);
// 	};
// 	elm.ondragover = function () {
// 		event.preventDefault();
// 		let rect = this.getBoundingClientRect();
// 		if ((event.clientX - rect.top) < (this.clientWidht / 2)) {
// 			//マウスカーソルの位置が要素の半分より上
// 			this.style.borderTop = '2px solid blue';
// 			this.style.borderBottom = '';
// 		} else {
// 			//マウスカーソルの位置が要素の半分より下
// 			this.style.borderTop = '';
// 			this.style.borderBottom = '2px solid blue';
// 		}
// 	};
// 	elm.ondragleave = function () {
// 		this.style.borderTop = '';
// 		this.style.borderBottom = '';
// 	};
// 	elm.ondrop = function () {
// 		event.preventDefault();
// 		let id = event.dataTransfer.getData('text/plain');
// 		let elm_drag = document.getElementById(id);

// 		let rect = this.getBoundingClientRect();
// 		if ((event.clientX - rect.top) < (this.clientWidht / 2)) {
// 			//マウスカーソルの位置が要素の半分より上
// 			this.parentNode.insertBefore(elm_drag, this);
// 		} else {
// 			//マウスカーソルの位置が要素の半分より下
// 			this.parentNode.insertBefore(elm_drag, this.nextSibling);
// 		}
// 		this.style.borderTop = '';
// 		this.style.borderBottom = '';
// 	};
// });