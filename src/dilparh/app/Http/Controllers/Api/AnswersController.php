<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Answer;  // *1
use App\Http\Resources\AnswerResource;  // *2

class AnswersController extends Controller
{
    public function index()
    {
        $answers = Answer::latest()
            ->ignoreFlagged()  // *3
            ->paginate(20);
 
        return AnswerResource::collection($answers);
    }
 
    public function show(Answer $answer)
    {
        return new AnswerResource($answer);
    }
 
    public function store(Request $request)
    {
        $answer = $this->validate( $request, [
            'users_id'  => 'required|min:1|max:50',
            'words_id' => 'required|min:1',
            'correct'  => 'required|min:1',
            'wrong'  => 'required|min:1',
        ] );
 
        $answer = Answer::create($answer);
 
        return new AnswerResource($answer);
    }

    //     public function update(Request $request)
    // {
    //     Answer::where("id", $request->answers_id, "id")->update([
    //         "correct" => $request->correct,
    //         "wrong" => $request->wrong,
    //     ]);
    // }
}
