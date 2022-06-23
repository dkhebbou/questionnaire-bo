@extends('layout')

@section('content')
<ul class="collection with-header">
    <li class="collection-header">
        <h2 class="flow-text">Questionnaires
            <span style="float:right;">
                <a href="{{ url('admin-sondage/creer') }}">Créer un questionnaire</a>
            </span>
        </h2>
    </li>
    @forelse ($surveys as $survey)
      <li class="collection-item">
        <div>
            <a href="{{ url('admin-sondage/detail-questionnaire') }}">{{$survey->titre}}</a>
            <a href="survey/view/{{ $survey->id }}" title="Take Survey" class="secondary-content"><i class="material-icons">send</i></a>
            <a href="admin-sondage/{{ $survey->id }}" title="Edit Survey" class="secondary-content"><i class="material-icons">edit</i></a>
            <a href="survey/answers/{{ $survey->id }}" title="View Survey Answers" class="secondary-content"><i class="material-icons">textsms</i></a>
        </div>
        </li>
    @empty
        <p class="flow-text center-align">Aucun questionnaire n'est disponible</p>
    @endforelse
    </ul>

@stop
