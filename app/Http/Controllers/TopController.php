<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\words;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;

class TopController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * HOME画面
     */
    public function index()
    {
        return view('index');
    }

    /**
     * PC使い方
     */
    public function how()
    {
        return view('how');
    }

    /**
     * SP使い方
     */
    public function how_sp()
    {
        return view('how_sp');
    }

    /**
     * アプリについて画面
     */
    public function about()
    {
        return view('about');
    }
    /**
     * 設定画面
     */
    public function config()
    {
        return view('config');
    }

    /**
     * 辞書画面
     */
    public function dictionary($language = 'null')
    {
        if ($language === 'japanese') {
            return view('dictionary_japanese');
        } else {
            return view('dictionary_urdu');
        }
    }

    /**
     * 辞書 検索結果表示
     */
    public function dictionary_result(Request $word, $language = 'null')
    {
        $word = $word->input('word');

        if ($language === 'japanese') {
            $results = DB::table('words')
                ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'ExampleSentence', 'ExampleMeaning')
                ->where('hiragana', 'LIKE', "%$word%")
                ->OrWhere('japanese', 'LIKE', "%$word%")
                ->get();
            $results = json_decode(json_encode($results), true);
        } else {
            // ウルドゥー語検索
            $results = DB::table('words')
                ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'ExampleSentence', 'ExampleMeaning')
                ->where('word_urdu', 'LIKE', "%$word%")
                ->get();
            $results = json_decode(json_encode($results), true);
        }

        return view('dictionary_result', [
            'results' => $results
        ])
            ->with('word', $word);
    }

    /**
     * 回答するパートの選択.
     */
    public function select_part()
    {
        $part = [];
        for ($i = 1; $i < 7; $i++) {
            $part[$i] = $this->getPartData($i)['totalNum'];
        }
        return view('select_part', [
            'part' => $part
        ]);
    }

    /**
     * アカウントのメールアドレスを変更する
     */
    public function edit_account(Request $email)
    {
        $email = $email->input('email');
        DB::table('users')
            ->where('id', '=', Auth::id())
            ->update([
                'email' => $email
            ]);
        return '完了';
    }

    /**
     * 回答記録を削除する
     */
    public function delete(Request $part)
    {
        $part = $part->input('part');
        $part = str_replace('part', '', $part);

        $ids = DB::table('words')
            ->select('id')
            ->where('words.part', '=', $part)
            ->get();
        $ids = json_decode(json_encode($ids), true);

        DB::table('answers')
            ->where('users_id', '=', Auth::id())
            ->whereIn('words_id', $ids)
            ->update([
                'correct' => 0,
                'wrong' => 0,
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        return "完了";
    }


    /**
     *　スタート画面
     */
    public function start($part = 'null')
    {
        $part = str_replace('part', '', $part);
        // select_gameでどのパートを選んだかによって、start_gameのテンプレートに当てはめる値を変える
        switch ($part) {
            case '1':
                $data = $this->getPartData($part, "ウルドゥー語は初めてか？大丈夫、初級の単語を覚えれば<br class='br-none'>ネイティブの言うことを大体理解することができる！何度も演習して必ず覚えよう！");
                break;
            case '2':
                $data = $this->getPartData($part, "このパートでは固有名詞に特化して学習を進めていくぞ！<br class='br-none'>現地で一番知らずに困るのは名詞だったりするから、気を入れて学習に取り組もう！");
                break;
            case '3':
                $data = $this->getPartData($part, "このパートでは固有名詞に特化して学習を進めていくぞ！<br class='br-none'>現地で一番知らずに困るのは名詞だったりするから、気を入れて学習に取り組もう！");
                break;
            case '4':
                $data = $this->getPartData($part, "このパートでは会話に出てくる少しレベルの高い語彙を学習する！<br class='br-none'>ここまで来たら二年生修了レベルだ！");
                break;
            case '5':
                $data = $this->getPartData($part, "このパートではニュースや本で頻出する語彙を学習していく！<br class='br-none'>このパートを修了すると三年次でとる翻訳の授業に自信をもって参加できるぞ！");
                break;
            case '6':
                $data = $this->getPartData($part, "最後のパートだな。ここでは頻度が高くない名詞を学習していくぞ。<br class='br-none'>ここまで修了すると卒業レベルだ！");
                break;
        }
        return view('start', $data);
    }

    /**
     *　指定されたpartのデータを取得する
     */
    public function getPartData($part, $explanation = null)
    {
        $whole_part = DB::table('words')
            ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'japanese as correct', 'japanese as wrong', 'ExampleSentence', 'ExampleMeaning')
            ->where('words.part', '=', $part)
            ->get();
        $whole_part = json_decode(json_encode($whole_part), true);
        $whole_partNum = count($whole_part);

        $twocorrect = DB::table('words')
            ->leftJoin('answers', 'words.id', '=', 'answers.words_id')
            ->select('words.id as word_id')
            ->where('words.part', '=', $part)
            ->where('answers.users_id', '=', Auth::id())
            ->where('answers.correct', '>=', '2')
            ->get();
        if (count($twocorrect) > 0) {
            $twocorrect = json_decode(json_encode($twocorrect), true);
            $masterNum = count($twocorrect);
        } else {
            $twocorrect = 0;
            $masterNum = 0;
        };

        $data = [
            'title' => 'PART' . $part,
            'explanation' => $explanation,
            'level' => "<b>" . $masterNum . "</b>/" . $whole_partNum . "語　マスター",
            'part' => $part,
            'masterNum' => $masterNum,
            'totalNum' => $whole_partNum
        ];

        return $data;
    }

    /**
     * クイズ画面
     */
    public function quiz(Request $quantitiy, $part = 'null', $review = 'null')
    {
        $part = str_replace('part', '', $part);

        // 何問解くか
        $quantitiy = $quantitiy->input('quantitiy');
        $quantitiy = str_replace('語', '', $quantitiy);

        // 連想配列の差分消す関数
        function array_diff_assoc_recursive($array1, $array2)
        {
            $difference = array();
            foreach ($array1 as $key => $value) {
                if (is_array($value)) {
                    if (!isset($array2[$key]) || !is_array($array2[$key])) {
                        $difference[$key] = $value;
                    } else {
                        $new_diff = array_diff_assoc_recursive($value, $array2[$key]);
                        if (!empty($new_diff)) {
                            $difference[$key] = $new_diff;
                        }
                    }
                } elseif (!array_key_exists($key, $array2) || $array2[$key] !== $value) {
                    $difference[$key] = $value;
                }
            }
            return $difference;
        }

        // すべての単語取得
        $words = DB::table('words')
            ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'japanese as correct', 'japanese as wrong', 'ExampleSentence', 'ExampleMeaning')
            ->orderBy('words.id')
            ->where('words.part', '=', $part)
            ->get();
        $words = json_decode(json_encode($words), true);
        // 誤答の選択肢用
        $dummywords = $words;
        $new_words = [];
        for ($i = 0; $i < count($words); $i++) {
            $new_words[$words[$i]['word_id']] = $words[$i];
        }
        $words = $new_words;

        if ($review == 'null') {
            // 「演習する」ボタン押した時
            // ログインユーザのanswersに存在するものすべて
            $userswords = DB::table('words')
                ->leftJoin('answers', 'words.id', '=', 'answers.words_id')
                ->where('answers.users_id', '=', Auth::id())
                ->where('answers.correct', '>=', 0)
                ->where('answers.wrong', '>=', 0)
                ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'japanese as correct', 'japanese as wrong', 'ExampleSentence', 'ExampleMeaning')
                ->get();
            $userswords = json_decode(json_encode($userswords), true);
            $new_userswords = [];
            for ($i = 0; $i < count($userswords); $i++) {
                $new_userswords[$userswords[$i]['word_id']] = $userswords[$i];
            }
            $userswords = $new_userswords;


            //一度リセットしてanswersに存在するが、answerもwrongも０のもの。一度wordsから省いたのちに、カラムを付け加えて配列の頭に追加する、
            $lisetwords = DB::table('words')
                ->leftJoin('answers', 'words.id', '=', 'answers.words_id')
                ->where('answers.users_id', '=', Auth::id())
                ->where('answers.correct', '=', 0)
                ->where('answers.wrong', '=', 0)
                ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'japanese as correct', 'japanese as wrong', 'ExampleSentence', 'ExampleMeaning')
                ->get();
            $lisetwords = json_decode(json_encode($lisetwords), true);
            // var_dump($limit_start,$limit_end,$userswords);

            $new_lisetwords = [];
            for ($i = 0; $i < count($lisetwords); $i++) {
                $new_lisetwords[$lisetwords[$i]['word_id']] = $lisetwords[$i];
            }
            $lisetwords = $new_lisetwords;
            // ログインユーザが一度説いた問題から、リセット済みの問題を省く
            if (!empty($lisetwords)) {
                $userswords = array_diff_assoc_recursive($userswords, $lisetwords);
            }
            // ログインユーザーが一度解いた問題を省く
            $words = array_diff_assoc_recursive($words, $userswords);

            // リセットされた問題も省く
            if (!empty($lisetwords)) {
                $words = array_diff_assoc_recursive($words, $lisetwords);
            }

            // 配列のキーを元に戻す
            $new_wordsset = [];
            $i = 0;
            foreach ($words as $key => $value) {
                $new_wordsset[$i] = $words[$key];
                $i++;
            }
            $words = $new_wordsset;

            //一度リセットした単語。カラムを付け加えて配列の頭に追加する
            $add_lisetwords = DB::table('words')
                ->leftJoin('answers', 'words.id', '=', 'answers.words_id')
                ->where('answers.users_id', '=', Auth::id())
                ->where('answers.correct', '=', 0)
                ->where('answers.wrong', '=', 0)
                ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'answers.correct', 'answers.wrong', 'answers.id as answers_id', 'japanese as liseted', 'ExampleSentence', 'ExampleMeaning')
                ->get();
            $add_lisetwords = json_decode(json_encode($add_lisetwords), true);
            // var_dump($limit_start,$limit_end,$userswords);

            $new_lisetwords = [];
            for ($i = 0; $i < count($add_lisetwords); $i++) {
                $new_lisetwords[$add_lisetwords[$i]['word_id']] = $add_lisetwords[$i];
            }
            $add_lisetwords = $new_lisetwords;

            if (!empty($add_lisetwords)) {
                $words = array_merge_recursive($add_lisetwords, $words);
            }

            // 足りなかったから、correctが1のものを取得
            if (count($words) < $quantitiy) {
                $onecorrectwords = DB::table('words')
                    ->leftJoin('answers', 'words.id', '=', 'answers.words_id')
                    ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'answers.correct', 'answers.wrong', 'answers.id as answers_id', 'ExampleSentence', 'ExampleMeaning')
                    ->orderBy('words.id')
                    ->where('words.part', '=', $part)
                    ->where('answers.users_id', '=', Auth::id())
                    ->where('answers.correct', '=', '1')
                    ->get();
                $onecorrectwords = json_decode(json_encode($onecorrectwords), true);
                if (!empty($words)) {
                    $words = array_merge_recursive($words, $onecorrectwords);
                } else {
                    $words = $onecorrectwords;
                }
            }

            // 足りなかったら、correctが2以上のものを取得
            if (count($words) < $quantitiy) {
                $twocorrectwords = DB::table('words')
                    ->leftJoin('answers', 'words.id', '=', 'answers.words_id')
                    ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'answers.correct', 'answers.wrong', 'answers.id as answers_id', 'ExampleSentence', 'ExampleMeaning')
                    ->orderBy('words.id')
                    ->where('words.part', '=', $part)
                    ->where('answers.users_id', '=', Auth::id())
                    ->where('answers.correct', '>=', '2')
                    ->get();
                $twocorrectwords = json_decode(json_encode($twocorrectwords), true);
                if (!empty($words)) {
                    $words = array_merge_recursive($words, $twocorrectwords);
                } else {
                    $words = $twocorrectwords;
                }
            }
        } else {
            // 「苦手を復習する」ボタン押した時
            // 間違えた問題
            $reviewwords = DB::table('words')
                ->leftJoin('answers', 'words.id', '=', 'answers.words_id')
                ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'answers.correct', 'answers.wrong', 'answers.id as answers_id', 'ExampleSentence', 'ExampleMeaning')
                ->orderBy('words.id')
                ->where('words.part', '=', $part)
                ->where('answers.users_id', '=', Auth::id())
                ->where('answers.wrong', '=', '1')
                ->get();
            $reviewwords = json_decode(json_encode($reviewwords), true);

            // 間違えた問題がなかったら、正答数が1の問題
            if (count($reviewwords) < 1) {
                $reviewwords2 = DB::table('words')
                    ->leftJoin('answers', 'words.id', '=', 'answers.words_id')
                    ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'answers.correct', 'answers.wrong', 'answers.id as answers_id', 'ExampleSentence', 'ExampleMeaning')
                    ->orderBy('words.id')
                    ->where('words.part', '=', $part)
                    ->where('answers.users_id', '=', Auth::id())
                    ->where('answers.correct', '=', '1')
                    ->get();
                $reviewwords = json_decode(json_encode($reviewwords2), true);
            }
            // 正答数１が無かったら、正答数2以上の問題
            if (count($reviewwords) < 1) {
                $reviewwords3 = DB::table('words')
                    ->leftJoin('answers', 'words.id', '=', 'answers.words_id')
                    ->select('words.id as word_id', 'word_urdu', 'pron', 'hinshi', 'gogen', 'japanese', 'answers.correct', 'answers.wrong', 'answers.id as answers_id', 'ExampleSentence', 'ExampleMeaning')
                    ->orderBy('words.id')
                    ->where('words.part', '=', $part)
                    ->where('answers.users_id', '=', Auth::id())
                    ->where('answers.correct', '>=', '2')
                    ->get();
                $reviewwords = json_decode(json_encode($reviewwords3), true);
            }
            $words = $reviewwords;
        }

        if ($words > $quantitiy) {
            $words = array_slice($words, 0, $quantitiy, true);
        }

        return view('quiz')
            ->with('words', $words)
            ->with('dummywords', $dummywords);
    }
}
