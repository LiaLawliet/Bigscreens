@extends('layouts.back')

@section('content')
    @forelse ($answers as $user_answer)
        <table class="table">
            <thead>
                <th width="5%">N°</th>
                <th width="60%">Question</th>
                <th width="35%">Réponses</th>
            </thead>
            @forelse ($questions as $question)
                <tr class="answers_list">
                    <td>{{$question->question_number}} </td>
                    <td>{{$question->question}}</td>
                    @foreach ($user_answer as $answer)
                        @if($answer->question_id === $question->question_number)
                            <td> {{$answer->answer}} </td>
                        @endif
                    @endforeach
                </tr>
            @empty
                <p>Pas de questions</p>
            @endforelse
        </table>
    @empty
        <p>Aucune réponse</p>
    @endforelse
@endsection