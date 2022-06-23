$(document).ready(function() {
  $('.collapsible').collapsible({
    accordion: false
  });

  $('.modal-trigger').leanModal();

  $(document).on('click', '.delete-option', function() {
    $(this).parent(".input-field").remove();
  });

  // will replace .form-g class when referenced
  var material = '<div class="input-field col input-g s6">' +
    '<input name="option_name[]" id="option_name[]" type="text">' +
    '<span style="float:right; cursor:pointer;"class="delete-option">Delete</span>' +
    '<label for="option_name">Options</label>' +
    '<span class="add-option" style="cursor:pointer;">Add Another</span>' +
    '</div>'+
    '<div class="input-field col input-g s6">' +
    '<input name="option_nameAr[]" id="option_nameAr[]" type="text">' +
    '<label for="option_name">OptionsAr</label>' +
    '<span class="add-option" style="color:white">Add Another</span>' +
    '</div>';


  // for adding new option
  $(document).on('click', '.add-option', function() {
    $(".form-g").append(material);
  });
  $(document).on('click', '.add-option-1', function() {
    var nbr = document.getElementById('nbrrubrique').value;
    var material1 = '<div class="input-field col s6">' +
        '<input name="rubrique[]" id="rubrique[]" type="text" required>' +
        '<label for="rubrique[]">Rubrique</label>' +
    '</div>' +
    '<div class="input-field col s6">' +
        '<input name="rubriqueAr[]" id="rubriqueAr[]" type="text" required>' +
        '<label for="rubriqueAr[]">Rubrique Ar</label>' +
    '</div>';
    document.getElementById('nbrrubrique').value = parseInt(nbr)+1;
    $(".form-g-1").append(material1);
  });
  // allow for more options if radio or checkbox is enabled
  $(document).on('change', '#question_type', function() {
    var selected_option = $('#question_type :selected').val();
    if (selected_option === "radio" || selected_option === "checkbox") {
      $(".form-g").html(material);
    } else {
      $(".input-g").remove();
    }
  });
});
