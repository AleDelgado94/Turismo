
    var aux=0;

    $("#rm_user").click(function() {
          $("#persona"+aux).remove();
          if(aux > 0)
            aux = aux-1;
            document.getElementById('n_personas').value = aux;
      });

    $("#add_user").click(function(){
    /*  $.getScript( "../../js/encuesta/inicio.js" )
        .done(function( script, textStatus ) {
          console.log( textStatus );
        })
        .fail(function( jqxhr, settings, exception ) {
          $( "div.log" ).text( "Triggered ajaxError handler." );
      });*/
      aux = aux+1;

      document.getElementById('n_personas').value = aux;

      var formu =
      "<div class='row' id ='persona"+ aux +"'>"+
        "<div class='col s12 m12 l12'>"+
          "<h5 class='left-align'>Persona "+aux+"</h5>"+
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
      /*var newscript = document.createElement('script');
     newscript.type = 'text/javascript';
     newscript.async = true;
     newscript.src = '../../js/encuesta/inicio.js';
     //(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(newscript);
     document.getElementById('user').appendChild(newscript);*/


    });
