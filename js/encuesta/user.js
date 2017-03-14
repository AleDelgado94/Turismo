
    var z;
    var aux=0;



function getAttr(val, id) {
  var identificador = "edad"+id;
  document.getElementById(identificador).value = val;
}

function getAttrSexo(val, id){
  var identificador = "sexo"+id;
  document.getElementById(identificador).value = val;
}

function getAttrNacionalidad(val, id){
  var identificador = "nacionalidad"+id;
  document.getElementById(identificador).value = val;
}

function getAttrResidencia(val, id){
  var identificador = "residencia"+id;

  if(val){
    document.getElementById(identificador).value = 1;
  }
  else {
    document.getElementById(identificador).value = 0;
  }



}






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

      var formu ="<div class='row' id ='persona"+ aux +"'>";
        formu += "<div class='col s12 m12 l12'>";
          formu += "<h5 class='left-align'>Persona "+aux+"</h5>";
          formu += "<hr>";
            formu += "<div class='row'>";
            formu += "<div class='col s12 m6 l6 left-align'>";
                formu += "<h5>Edad</h5>";
                formu += "<div class='row'>"
                  formu += "<input onchange='getAttr(this.value,"+ aux +")'  type='radio' name='edad"+aux+"' class='with-gap'  onclick='uncheckRadio(this)' value='0a12' id='0a12"+aux+"' />";
                  formu += "<label for='0a12"+aux+"'>0 a 12 años</label>";
                formu += "</div>";

                formu += "<div class='row'>"
                  formu += "<input onchange='getAttr(this.value,"+aux+")' type='radio' name='edad"+aux+"' class='with-gap'  onclick='uncheckRadio(this)' value='13a30' id='13a30"+aux+"' />";
                  formu += "<label for='13a30"+aux+"'>13 a 30 años</label>";
                formu += "</div>";
                formu += "<div class='row'>";
                  formu += "<input onchange='getAttr(this.value,"+aux+")' type='radio' name='edad"+aux+"' class='with-gap'  onclick='uncheckRadio(this)' value='31a50' id='31a50"+aux+"' />";
                  formu += "<label for='31a50"+aux+"'>31 a 50 años</label>";
                formu += "</div>";
                formu += "<div class='row'>";
                  formu += "<input onchange='getAttr(this.value,"+aux+")' type='radio' name='edad"+aux+"' class='with-gap'  onclick='uncheckRadio(this)' value='50mas' id='50mas"+aux+"' />";
                  formu += "<label for='50mas"+aux+"'>Más de 51 años</label>";
                formu += "</div>";
            formu += "</div>";

              formu += "<div class='col s12 m6 l6 left-align'>";
                  formu += "<h5>Sexo</h5>";
                  formu += "<div class='row'>";
                    formu += "<input type='radio' onchange='getAttrSexo(this.value,"+aux+")' name='sexo"+aux+"' class='with-gap' onchange='selectSexo(this.value)' onclick='uncheckRadio(this)' value='hombre' id='hombre"+aux+"' />";
                    formu += "<label for='hombre"+aux+"'>Hombre</label>";
                  formu += "</div>";
                  formu += "<div class='row'>";
                    formu += "<input type='radio' onchange='getAttrSexo(this.value,"+aux+")' name='sexo"+aux+"' class='with-gap' onchange='selectSexo(this.value)' onclick='uncheckRadio(this)' value='mujer' id='mujer"+aux+"' />";
                    formu += "<label for='mujer"+aux+"'>Mujer&nbsp;</label>";
                  formu += "</div>";
              formu += "</div>";
            formu += "</div>";


              formu += "<div class='row'>";
                formu += "<div class='col s12 m6 l6 left-align'>";
                  formu += "<h5>Nacionalidad</h5>";
                  formu += "<select name='nacion' onchange='getAttrNacionalidad(this.value,"+aux+")'>";
                    formu += "<option value='' disabled selected>Nacionalidad</option>";
                    formu += "<option value='Española'>Española</option>";
                    formu += "<option value='Británica'>Británica</option>";
                    formu += "<option value='Alemana'>Alemana</option>";
                    formu += "<option value='Rusa'>Rusa</option>";
                    formu += "<option value='Canaria'>Canaria</option>";
                    formu += "<option value='Africana'>Africana</option>";
                    formu += "<option value='Asiática'>Asiática</option>";
                    formu += "<option value='Australiana'>Australiana</option>";
                    formu += "<option value='Austriaca'>Austriaca</option>";
                    formu += "<option value='Belga'>Belga</option>";
                    formu += "<option value='Canadiense'>Canadiense</option>";
                    formu += "<option value='Checa'>Checa</option>";
                    formu += "<option value='China'>China</option>";
                    formu += "<option value='Danesa'>Danesa</option>";
                    formu += "<option value='Eslovena'>Eslovena</option>";
                    formu += "<option value='Estadounidense'>Estadounidense</option>";
                    formu += "<option value='Otros'>Otros</option>";
                  formu += "</select>";
                  formu += "<label>Nacionalidades</label>";
                formu += "</div>";
                formu += "<div class='input-field col s12 m6 l6 left-align'>";
                    formu += "<input type='checkbox' class='filled-in' onchange='getAttrResidencia(this.checked,"+aux+")' name='segunda_residencia"+aux+"' id='segunda_residencia"+aux+"' />";
                    formu += "<label  for='segunda_residencia"+aux+"'>Segunda Residencia</label>";
                formu += "</div>";
              formu += "</div>";
            formu += "</div>";
      formu += "</div>"
      ;


      z = document.createElement('div');
      z.innerHTML = formu;

      document.getElementById('USER').appendChild(z);

/*
      //CREAMOS INPUT HIDDEN PARA PHP
      var input_edad = document.createElement('input');
      input_edad.type = "hidden";
      input_edad.name = "edad" + aux;
      input_edad.id = "edad"+aux;


      var input_sexo = document.createElement('input');
      input_sexo.type = "hidden";
      input_sexo.name = "sexo" + aux;
      input_sexo.id = "sexo" + aux;

      var input_nacionalidad = document.createElement('input');
      input_nacionalidad.type = "hidden";
      input_nacionalidad.name = "nacionalidad" + aux;
      input_nacionalidad.id = "nacionalidad" + aux;

      var input_residencia = document.createElement('input');
      input_residencia.type = "hidden";
      input_residencia.name = "residencia" + aux;
      input_residencia.id = "residencia" + aux;
*/

      /*document.getElementById('USER').appendChild(input_edad);
      document.getElementById('USER').appendChild(input_sexo);
      document.getElementById('USER').appendChild(input_nacionalidad);
      document.getElementById('USER').appendChild(input_residencia);
*/




    });
