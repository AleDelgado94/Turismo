$(document).ready(function() {
  Materialize.updateTextFields();
  $('select').material_select();
  $(".button-collapse").sideNav();
  $('#textarea1').trigger('autoresize');
  $('select').material_select();
  $('ul.tabs').tabs();

  $( function() {
    $( ".datepicker" ).datepicker();
  });

    $.datepicker.regional.es = {
       closeText: 'Cerrar',
       prevText: '< Ant',
       nextText: 'Sig >',
       currentText: 'Hoy',
       monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
       monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
       dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
       dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
       dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
       weekHeader: 'Sm',
       dateFormat: 'yy-mm-dd',
       firstDay: 1,
       isRTL: false,
       yearSuffix: '',
       changeMonth: true,
       changeYear: true,
       showButtonPanel: true,
       yearRange: '2015:2050'

     };
    $.datepicker.setDefaults($.datepicker.regional.es);


});


function ofi(val) {
  document.getElementById('oficina').value = val;
}


function place(val){
  document.getElementById('lugar').value = val;
}
