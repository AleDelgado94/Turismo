

$(document).ready(function(){
    $('select').material_select();
    $('ul.tabs').tabs();
    $("#btnContinue").click(function() {
       $('ul.tabs').tabs('select_tab', 'test2');
    });

    $(function() {
      $( ".fecha" ).datepicker();
    });



      $.datepicker.regional.es = {
         closeText: 'Cerrar',
         prevText: '< Ant',
         changeMonth: true,
         changeYear: true,
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
         showButtonPanel: true,
         yearRange: '2015:2050'

       };
      $.datepicker.setDefaults($.datepicker.regional.es);




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

  document.getElementById('ofic').value = val;
  console.log(document.getElementById('ofic'));
}
