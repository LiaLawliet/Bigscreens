@extends('layouts.back')

@section('content')
    <table class="table table-dark">
        <thead class="">
            <tr>
                <th>N°</th>
                <th>Question</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($questions as $question)
            <tr>
                <td>
                    {{$question->question_number}}
                </td>
                <td>
                    {{$question->question}}
                </td>
                <td>
                    {{$question->question_type}}
                </td>
            </tr>
        @empty
        </tbody>
            
        @endforelse
    </table>
    
@endsection