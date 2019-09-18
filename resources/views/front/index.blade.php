@extends('layouts/master')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {!! session()->get('success') !!}
        </div>
    @endif
    <div class="survey_bloc">
            <p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page</p>
            <form action="{{route('answer.store')}}" method="post" id="survey_form">
                @csrf
                @forelse ($questions as $key => $question)
                    <div class="questions_bloc">
                        <h2>Question {{$question->question_number}}/{{count($questions)}}</h2>
                        <label>{{$question->question}}</label>
                        <br>
                        @switch($question->question_type)
                            @case("A")
                                <select name="q_a[{{$question->question_number}}]" id="choice_{{$question->question_number}}" @if($errors->has('q_a.'.$question->question_number)) class="alert-danger" @endif>
                                    <option value="">Choisissez une option</option>
                                    @foreach ($choices as $choice)
                                        @if($choice->question_id === $question->question_number)
                                            <option value="{{$choice->answers}}">{{$choice->answers}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('q_a.'.$question->question_number)) <span class="alert-danger">{{$errors->first('q_a.'.$question->question_number)}}</span>@endif
                                @break
        
                            @case("B")
                                @if($question->is_email)
                                    <input type="email" name="email[{{$question->question_number}}]" id="email_{{$question->question_number}}" required="required">
                                    @if($errors->has('email.'.$question->question_number)) <span class="alert-danger">{{$errors->first('email.'.$question->question_number)}}</span>@endif
                                @else
                                    <input type="text" name="q_b[{{$question->question_number}}]" id="choice_{{$question->question_number}}" maxlength="255" required>
                                    @if($errors->has('q_b.'.$question->question_number)) <span class="alert-danger">{{$errors->first('q_b.'.$question->question_number)}}</span>@endif
                                @endif
        
                                @break
        
                            @case("C")
                                <select name="q_c[{{$question->question_number}}]" id="choice_{{$question->question_number}}" @if($errors->has('q_c.'.$question->question_number)) class="alert-danger" @endif>
                                    <option value="">Choisissez</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @if($errors->has('q_c.'.$question->question_number)) <span class="alert-danger">{{$errors->first('q_c.'.$question->question_number)}}</span>@endif
                                @break
                            @default
                        @endswitch
                    </div>
                @empty
                    <p>Le sondage ne possede pas de questions.</p>
                @endforelse
                <div class="validate-form">
                    <button type="submit" class="btn-validate" value="Valider">Valider</button>
                </div>
            </form>
    </div>
@endsection