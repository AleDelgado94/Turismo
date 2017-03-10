$(document).ready(function(){
    $('select').material_select();
    $('ul.tabs').tabs();

});

$( "#datepicker" ).datepicker({
    // Formato de la fecha
    dateFormat: "dd/mm/yy",
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


    $('#add_user').click(function(){

      document.write(
        "<div class='row'>"+
        "<div class='col s12 m12 l12'>"+
          "<hr>"+
          "<h5>Sexo</h5>"+
            "<div class='row'>"+
              "<div class='col s12 m6 left-align'>"+
                  "<div class='row'>"+
                    "<input type='radio' name='sexo' class='with-gap' id='hombre' />"+
                    "<label for='hombre'>Hombre</label>"+
                  "</div>"+
                  "<div class='row'>"+
                    "<input type='radio' name='sexo' class='with-gap' id='mujer' />"+
                    "<label for='mujer'>Mujer&nbsp;</label>"+
                  "</div>"+
              "</div>"+
            "</div>"+

            "<h5>Edad</h5>"+
              "<div class='row'>"+
                "<div class='col s12 m12 l12 left-align'>"+
                  "<div class='row'>"+
                    "<input type='radio' name='edad' class='with-gap' id='0a12' />"+
                    "<label for='0a12'>0 a 12 años</label>"+
                  "</div>"+

                  "<div class='row'>"+
                    "<input type='radio' name='edad' class='with-gap' id='12a30' />"+
                    "<label for='12a30'>13 a 30 años</label>"+
                  "</div>"+
                  "<div class='row'>"+
                    "<input type='radio' name='edad' class='with-gap' id='31a50' />"+
                    "<label for='31a50'>31 a 50 años</label>"+
                  "</div>"+
                  "<div class='row'>"+
                    "<input type='radio' name='edad' class='with-gap' id='50mas' />"+
                    "<label for='50mas'>Más de 51 años</label>"+
                  "</div>"+

                "</div>"+
              "</div>"+

              "<h5>Nacionalidad</h5>"+
              "<div class='input-field col s12 m12 l12 left-align'>"+
                "<select>"+
                  "<option value='' disabled selected>Nacionalidad</option>"+
                  "<option value='Española'>Española</option>"+
                  "<option value='Británica'>Británica</option>"+
                  "<option value='Alemana'>Alemana</option>"+
                  "<option value='Rusa'>Rusa</option>"+
                  "<option value='Canaria'>Canaria</option>"+
                  "<option value='Africana'>Africana</option>"+
                  "<option value='Asiática'>Asiática</option>"+
                  "<option value='Australiana'>Australiana</option>"+
                  "<option value='Austriaca'>Austriaca</option>"+
                  "<option value='Belga'>Belga</option>"+
                  "<option value='Canadiense'>Canadiense</option>"+
                  "<option value='Checa'>Checa</option>"+
                  "<option value='China'>China</option>"+
                  "<option value='Danesa'>Danesa</option>"+
                  "<option value='Eslovena'>Eslovena</option>"+
                  "<option value='Estadounidense'>Estadounidense</option>"+
                  "<option value='Otros'>Otros</option>"+
                "</select>"+
                "<label>Nacionalidades</label>"+
                "<div class='row'>"+
                  "<div class='col s12 m12 l12 left-align'>"+
                    "<input type='checkbox' class='filled-in' name='segunda_residencia' id='segunda_residencia' />"+
                    "<label  for='segunda_residencia'>Segunda Residencia</label>"+
                  "</div>"+
                "</div>"+
              "</div>"+
            "</div>"+
        "</div>)"



)});
