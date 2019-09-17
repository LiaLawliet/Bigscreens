<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Choice;

class FrontController extends Controller
{
    public function index(){
        $questions = Question::all();
        $choices = Choice::all();
        return view('front.index', ['questions' => $questions, 'choices' => $choices]);
    }
}
