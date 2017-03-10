$(document).ready(function(){
    $('select').material_select();
    $('ul.tabs').tabs();
    $('.datepicker').pickadate()


//Funcion que muestra el calendario
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







    var aux=0;

    $("#rm_user").click(function() {
          $("#persona"+aux).remove();
          aux = aux-1;
      });

    $("#add_user").click(function(){
      aux = aux+1;
      var formu =
      "<div class='row' id ='persona"+ aux +"'>"+
        "<div class='col s12 m12 l12'>"+
          "<h5 class='left-align'>Persona"+aux+"</h5>"+
          "<hr>"+
            "<div class='row'>"+
            "<div class='col s12 m6 l6 left-align'>"+
                "<h5>Edad</h5>"+
                "<div class='row'>"+
                  "<input type='radio' name='edad"+aux+"' class='with-gap' id='0a12"+aux+"' />"+
                  "<label for='0a12"+aux+"'>0 a 12 años</label>"+
                "</div>"+

                "<div class='row'>"+
                  "<input type='radio' name='edad"+aux+"' class='with-gap' id='12a30"+aux+"' />"+
                  "<label for='12a30"+aux+"'>13 a 30 años</label>"+
                "</div>"+
                "<div class='row'>"+
                  "<input type='radio' name='edad"+aux+"' class='with-gap' id='31a50"+aux+"' />"+
                  "<label for='31a50"+aux+"'>31 a 50 años</label>"+
                "</div>"+
                "<div class='row'>"+
                  "<input type='radio' name='edad"+aux+"' class='with-gap' id='50mas"+aux+"' />"+
                  "<label for='50mas"+aux+"'>Más de 51 años</label>"+
                "</div>"+
            "</div>"+

              "<div class='col s12 m6 l6 left-align'>"+
                  "<h5>Sexo</h5>"+
                  "<div class='row'>"+
                    "<input type='radio' name='sexo"+aux+"' class='with-gap' id='hombre"+aux+"' />"+
                    "<label for='hombre"+aux+"'>Hombre</label>"+
                  "</div>"+
                  "<div class='row'>"+
                    "<input type='radio' name='sexo"+aux+"' class='with-gap' id='mujer"+aux+"' />"+
                    "<label for='mujer"+aux+"'>Mujer&nbsp;</label>"+
                  "</div>"+
              "</div>"+
            "</div>"+


              "<div class='row'>"+
                "<div class='col s12 m6 l6 left-align'>"+
                  "<h5>Nacionalidad</h5>"+
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
                "</div>"+
                "<div class='input-field col s12 m6 l6 left-align'>"+
                    "<input type='checkbox' class='filled-in' name='segunda_residencia"+aux+"' id='segunda_residencia"+aux+"' />"+
                    "<label  for='segunda_residencia"+aux+"'>Segunda Residencia</label>"+
                "</div>"+
              "</div>"+
            "</div>"+
      "</div>";


      $("#user").append(formu);

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
