$(document).ready(function(){
    $('select').material_select();
    $('ul.tabs').tabs();
    $('.datepicker').pickadate();



//Funcion que muestra el calendario
    $( "#datepicker" ).datepicker({
        // Formato de la fecha
        dateFormat: "dd/mm/y",
        // Primer dia de la semana El lunes
        firstDay: 1,
        // Dias Largo en castellano
        dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
        // Dias cortos en castellano
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        // Nombres largos de los meses en castellano
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        // Nombres de los meses en formato corto
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec" ],
        // Cuando seleccionamos la fecha esta se pone en el campo Input
        onSelect: function(dateText) {
              $('#fecha').val(dateText);
          }
    });


});


//Funcion que deselecciona el radiobutton
    var era;
    var previo=null;
    function uncheckRadio(rbutton){
      if(previo &&previo!=rbutton){previo.era=false;}
      if(rbutton.checked === true && rbutton.era === true){rbutton.checked=false;}
      rbutton.era=rbutton.checked;
      previo=rbutton;
    }


function cambio(val){
  var ofi = val;
  document.getElementById('oficina').value = ofi;

}
