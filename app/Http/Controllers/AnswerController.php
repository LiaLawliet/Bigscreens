<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Answer;
use App\Question;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $this->validate($request,[
            'email.*' => 'required|email:filter',
            'q_a.*' => 'required',
            'q_b.*' => 'required|min:1|max:255',
            'q_c.*' => 'required|regex:/[1-5]/',
        ]);

        $answers = [];

        foreach ($request->email as $el => $value) {
            $answers[$el] = $value;
        }
        foreach ($request->q_a as $el => $value) {
            $answers[$el] = $value;
        }
        foreach ($request->q_b as $el => $value) {
            $answers[$el] = $value;
        }
        foreach ($request->q_c as $el => $value) {
            $answers[$el] = $value;
        }

        ksort($answers);
        
        $user_id = Str::uuid()->toString();

        foreach($answers as $el => $val){
            Answer::create([
                'user_id' => $user_id,
                'survey_id' => $request->survey_id,
                'question_id' => $el,
                'answer' => $val
            ]);
        }

        return redirect('/');
    }
}
