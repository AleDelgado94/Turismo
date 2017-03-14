$(document).ready(function() {
  Materialize.updateTextFields();
  $('select').material_select();
  $(".button-collapse").sideNav();
  $('#textarea1').val('New Text');
  $('#textarea1').trigger('autoresize');

  $('.datepicker').pickadate({
     selectMonths: true, // Creates a dropdown to control month
     selectYears: 15 // Creates a dropdown of 15 years to control year
   });
});
