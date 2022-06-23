@extends('layout')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> Ajout d'un questionnaire</span>
      <form method="POST" action="create" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="nbrrubrique" value="1" id="nbrrubrique"/>
        <div class="row">
          <div class="input-field col s6">
            <input name="titre" id="titre" type="text" required>
            <label for="titre">Titre</label>
          </div>
          <div class="input-field col s6">
            <input name="titreAr" id="titreAr" type="text" required>
            <label for="titreAr">TitreAr</label>
          </div>
          <div class="input-field col s6">
            <textarea name="description" id="description" class="materialize-textarea" required></textarea>
            <label for="description">Description</label>
          </div>
          <div class="input-field col s6">
            <textarea name="descriptionAr" id="descriptionAr" class="materialize-textarea" required></textarea>
            <label for="descriptionAr">DescriptionAr</label>
          </div>
          <div class="input-field col s6">
            <input name="rubrique[]" id="rubrique[]" type="text" required>
            <label for="rubrique">Rubrique</label>
          </div>
          <div class="input-field col s6">
            <input name="rubriqueAr[]" id="rubriqueAr[]" type="text" required>
            <label for="rubriqueAr">Rubrique Ar</label>
          </div>
          <div class="input-field col s12"><span class="add-option-1" style="cursor:pointer;">Ajouter une autre rubrique</span>' +</div>
          <!-- this part will be chewed by script in init.js -->
          <span class="form-g-1"></span>
          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Enregistrer</button>
          </div>
        </div>
        </form>
    </div>
  </div>
@stop
