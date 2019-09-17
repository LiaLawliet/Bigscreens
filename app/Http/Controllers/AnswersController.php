<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;

class AnswersController extends Controller
{
    public function index(){
        $answers = Answer::all();
        $questions = Question::all();
        $final_answers = [];
        if (count($answers) !== 0) {
            foreach ($answers as $key => $value) {
                $final_answers[$value->user_id][$key] = $value;
            }
        }
        return view('back.answers',['answers'=>$final_answers, 'questions'=>$questions]);
    }
    
}
