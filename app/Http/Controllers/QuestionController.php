<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function index(){
        $questions = Question::all();
        return view('back.questions',['questions' => $questions]);
    }
}
