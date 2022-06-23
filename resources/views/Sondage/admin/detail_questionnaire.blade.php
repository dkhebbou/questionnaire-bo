@extends('layout')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> {{ $survey->titre }}</span>
      <p>
        {{ $survey->description }}
      </p>
      <br/>
      <a href='view/{{$survey->id}}'>Repondre</a> | <a href="{{$survey->id}}/edit">Modifier</a> | <a href="/survey/answers/{{$survey->id}}">reponses</a> <a href="#doDelete" style="float:right;" class="modal-trigger red-text">Supprimer</a>
      <!-- Modal Structure -->
      <!-- TODO Fix the Delete aspect -->
      <div id="doDelete" class="modal bottom-sheet">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <h4>Are you sure?</h4>
              <p>Do you wish to delete this survey called "{{ $survey->titre }}"?</p>
              <div class="modal-footer">
                <a href="/survey/{{ $survey->id }}/delete" class=" modal-action waves-effect waves-light btn-flat red-text">Yep yep!</a>
                <a class=" modal-action modal-close waves-effect waves-light green white-text btn">No, stop!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="divider" style="margin:20px 0px;"></div>
      <p class="flow-text center-align">Questions</p>
      <ul class="collapsible" data-collapsible="expandable">
          @forelse ($survey->rubriques as $rubrique)
            @forelse ($rubrique->questions as $question)
            <li style="box-shadow:none;">
                <div class="collapsible-header"><p>{{$question->titre }}</p> <a href="/question/{{ $question->id }}/edit" style="float:right;">Edit</a></div>
                <div class="collapsible-body">
                <div style="margin:5px; padding:10px;">
                    {!! Form::open() !!}
                        @if($question->question_type === 'text')
                        {{ Form::text('titre')}}
                        @elseif($question->question_type === 'textarea')
                        <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea"></textarea>
                            <label for="textarea1">Donner une réponse</label>
                        </div>
                        </div>
                        @elseif($question->question_type === 'radio')
                        @foreach($question->option_name as $key=>$value)
                            <p style="margin:0px; padding:0px;">
                            <input type="radio" id="{{ $key }}" />
                            <label for="{{ $key }}">{{ $value }}</label>
                            </p>
                        @endforeach
                        @elseif($question->question_type === 'checkbox')
                        @foreach($question->option_name as $key=>$value)
                        <p style="margin:0px; padding:0px;">
                            <input type="checkbox" id="{{ $key }}" />
                            <label for="{{$key}}">{{ $value }}</label>
                        </p>
                      @endforeach
                    @endif
                  {!! Form::close() !!}
              </div>
            </div>
          </li>
          @endforeach
          @empty
            <span style="padding:10px;">Aucune rubrique dans ce questionnaire.</span>
          @endforelse

      </ul>
      <h2 class="flow-text">Ajouter des questions</h2>
      <form method="POST" action="{{ $survey->id }}/questions" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="input-field col s12">
            <select class="browser-default" name="question_type" id="question_type" required>
              <option value="" disabled selected>Type de la question</option>
              <option value="text">Text</option>
              <option value="textarea">Textarea</option>
              <option value="checkbox">Checkbox</option>
              <option value="radio">Radio Buttons</option>
            </select>
          </div>
          <div class="input-field col s12">
            <select class="browser-default" name="rubrique" id="rubrique" required>
              <option value="" disabled selected>Rubrique de la question</option>
              @foreach($rubriques as $r)
                <option value="{{$r->id}}">{{$r->titre}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-field col s6">
            <input name="titre" id="titre" type="text" required>
            <label for="titre">Question</label>
          </div>
          <div class="input-field col s6">
            <input name="titreAr" id="titreAr" type="text" required>
            <label for="titreAr">QuestionAr</label>
          </div>
          <!-- this part will be chewed by script in init.js -->
          <span class="form-g"></span>

          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Enregistrer la question</button>
          </div>
        </div>
        </form>
    </div>
  </div>
@stop
