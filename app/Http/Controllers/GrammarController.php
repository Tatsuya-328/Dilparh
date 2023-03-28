<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\words;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;

class GrammarController extends Controller
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
        return view('grammar.index');
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
     *　問題選択画面
     */
    public function part($part = 'null')
    {
        $data = null;
        return view('grammar.part');
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
    public function quiz($part = 'null', $quiz = 'null')
    {

        return view('grammar.quiz', [
            'quiz' => $quiz
        ]);
    }
}
