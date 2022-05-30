<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AnswerResource;
use App\Answer;

class ReportAnswersController extends Controller
{
       /**
     * 通報処理
     *
     * @param Answer $Answer
     * @return AnswerResource
     */
    public function update( Answer $id, $answer, $wrong )
    {
        $id->flag($answer,$wrong);
 
        return new AnswerResource($id);
    }
}
