$(document).ready(function(){
    $('select').material_select();
    $('ul.tabs').tabs();
    //$('.datepicker').pickadate();

      $( function() {
        $( "#datepicker" ).datepicker();
        $.datepicker.setDefaults({
          showOn: "both",
          buttonImageOnly: true,
          buttonImage: "calendar.gif",
          buttonText: "Calendario"
        });
        $.datepicker.setDefaults( $.datepicker.regional.es );
      } );

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
         showMonthAfterYear: true,
         yearSuffix: ''
       };
      $.datepicker.setDefaults($.datepicker.regional.es);
        $(function () {
        $("#fecha").datepicker();
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

  document.getElementById('ofic').value = val;
  console.log(document.getElementById('ofic'));
}
