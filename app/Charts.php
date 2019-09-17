<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Choice;

class Charts extends Model
{
    public static function pieCharts(int $question_id){
        $request = DB::table('answers')
        ->select(DB::raw('count("answer") as count, answer'))
        ->where('question_id', $question_id)
        ->groupBy('answer')->get();

        $questions = Choice::all()
                    ->where('question_id', $question_id)
                    ->pluck('answers')
                    ->toArray();

        $data = [];
        
        foreach ($request as $el => $value) {
            $data[$value->answer] = $value->count;
        }
        foreach ($questions as $el => $value) {
            if (!array_key_exists($value, $data)) {
                $data[$value] = 0;
            }
        }
        return $data;
    }

    public static function radarCharts(array $question_ids){

        $data = [];

        for ($i=0; $i < count($question_ids); $i++) {
            $request = DB::table('answers')
                ->select(DB::raw('ROUND(AVG(answer), 2) as note'))
                ->where('question_id', $question_ids[$i])
                ->value('note');

            $data['Question '.$question_ids[$i]] = $request;
        }

        return $data;
    }
}
