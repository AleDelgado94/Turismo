
    var aux=0;

    $("#rm_user").click(function() {
          $("#persona"+aux).remove();
          if(aux > 0)
            aux = aux-1;
            document.getElementById('n_personas').value = aux;
      });

    $("#add_user").click(function(e){
      e.preventDefault();

      var newscript = document.createElement('script');
     newscript.type = 'text/javascript';
     newscript.async = true;
     newscript.src = '../../js/encuesta/inicio.js';
     (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(newscript);



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
                  "<input type='radio' name='edad"+aux+"' class='with-gap' onchange='selectEdad(this.value,this, aux)' onclick='uncheckRadio(this)' value='0a12' id='0a12"+aux+"' />"+
                  "<label for='0a12"+aux+"'>0 a 12 años</label>"+
                "</div>"+

                "<div class='row'>"+
                  "<input type='radio' name='edad"+aux+"' class='with-gap' onchange='selectEdad(this.value)' onclick='uncheckRadio(this)' value='12a30' id='12a30"+aux+"' />"+
                  "<label for='12a30"+aux+"'>13 a 30 años</label>"+
                "</div>"+
                "<div class='row'>"+
                  "<input type='radio' name='edad"+aux+"' class='with-gap' onchange='selectEdad(this.value)' onclick='uncheckRadio(this)' value='31a50' id='31a50"+aux+"' />"+
                  "<label for='31a50"+aux+"'>31 a 50 años</label>"+
                "</div>"+
                "<div class='row'>"+
                  "<input type='radio' name='edad"+aux+"' class='with-gap' onchange='selectEdad(this.value)' onclick='uncheckRadio(this)' value='50mas' id='50mas"+aux+"' />"+
                  "<label for='50mas"+aux+"'>Más de 51 años</label>"+
                "</div>"+
            "</div>"+

              "<div class='col s12 m6 l6 left-align'>"+
                  "<h5>Sexo</h5>"+
                  "<div class='row'>"+
                    "<input type='radio' name='sexo"+aux+"' class='with-gap' onchange='selectSexo(this.value)' onclick='uncheckRadio(this)' value='hombre' id='hombre"+aux+"' />"+
                    "<label for='hombre"+aux+"'>Hombre</label>"+
                  "</div>"+
                  "<div class='row'>"+
                    "<input type='radio' name='sexo"+aux+"' class='with-gap' onchange='selectSexo(this.value)' onclick='uncheckRadio(this)' value='mujer' id='mujer"+aux+"' />"+
                    "<label for='mujer"+aux+"'>Mujer&nbsp;</label>"+
                  "</div>"+
              "</div>"+
            "</div>"+


              "<div class='row'>"+
                "<div class='col s12 m6 l6 left-align'>"+
                  "<h5>Nacionalidad</h5>"+
                  "<select onchange='selectNacionalidad(this.value)'>"+
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
                    "<input type='checkbox' class='filled-in' onchange='selectResidencia(this.value)' name='segunda_residencia"+aux+"' id='segunda_residencia"+aux+"' />"+
                    "<label  for='segunda_residencia"+aux+"'>Segunda Residencia</label>"+
                "</div>"+
              "</div>"+
            "</div>"+
      "</div>"
      ;


      $(".user__").append(formu);

      var node ;
      var textnode = document.createTextNode(formu);
      node.appendChild(textnode);
      document.getElementById("user").appendChild(node);

    });
