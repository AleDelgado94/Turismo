
    var z;
    var aux=0;



function getAttrEdad(val, id) {
  var identificador = "edad"+id;
  document.getElementById(identificador).value = val;
}

function getAttrSexo(val, id){
  var identificador = "sexo"+id;
  document.getElementById(identificador).value = val;
  console.log(document.getElementById(identificador).value);
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

        for (var i = 0; i <= aux; i++) {
          $("#persona"+i).remove();
            document.getElementById('n_personas').value = aux;
        }
        aux = 0;

        document.getElementById("number_people").value = "";
      });

    $("#add_user").click(function(e){

      //ELIMINAMOS CUALQUIER VALOR ANTERIOR
      for (var i = 0; i <= aux; i++) {
        $("#persona"+i).remove();
          document.getElementById('n_personas').value = aux;
      }
      aux = 0;


      e.preventDefault();

      var newscript = document.createElement('script');
     newscript.type = 'text/javascript';
     newscript.async = true;
     newscript.src = '../../js/encuesta/inicio.js';
     (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(newscript);



    //  aux = aux+1;
      aux = document.getElementById("number_people").value;
      document.getElementById("number_people").value = "";

      console.log(aux);

      document.getElementById('n_personas').value = aux;

      for (var i = 1; i <= aux; i++) {
        var formu ="<div class='row' id ='persona"+ i +"'>";
          formu += "<div class='col s12 m12 l12'>";
            formu += "<h5 class='left-align'>Persona "+i+"</h5>";
            formu += "<hr>";
              formu += "<div class='row'>";
              formu += "<div class='col s12 m3 l3 left-align'>";
                  formu += "<select name='edad"+i+"' onchange='getAttrEdad(this.value,"+i+")'>";
                    formu += "<option value='' disabled selected>Edad</option>";
                    formu += "<option value='0a12' id='0a12"+i+"'>0 a 12 años</option>";
                    formu += "<option value='13a30' id='13a30"+i+"'>13 a 30 años</option>";
                    formu += "<option value='31a50' id='31a50"+i+"'>31 a 50 años</option>";
                    formu += "<option value='50mas' id='50mas"+i+"'>Más de 51 años</option>";
                  formu += "</select>";
                  formu += "<label>Nacionalidades</label>";
              formu += "</div>";

                formu += "<div class='col s12 m3 l3 left-align'>";
                  formu += "<select name='sex' onchange='getAttrSexo(this.value,"+i+")'>";
                    formu += "<option value='' disabled selected>Sexo</option>";
                    formu += "<option value='hombre' >Hombre</option>";
                    formu += "<option value='mujer'>Mujer</option>";
                  formu += "</select>";
                  formu += "<label>Sexo</label>";
                formu += "</div>";


                  formu += "<div class='col s12 m4 l3'>";
                    formu += "<select name='nacion' onchange='getAttrNacionalidad(this.value,"+i+")'>";
                      formu += "<option value='' disabled selected>Nacionalidad</option>";
                      formu += "<option value='Espanola'>Española</option>";
                      formu += "<option value='Britanica'>Británica</option>";
                      formu += "<option value='Alemana'>Alemana</option>";
                      formu += "<option value='Rusa'>Rusa</option>";
                      formu += "<option value='Canaria'>Canaria</option>";
                      formu += "<option value='Africana'>Africana</option>";
                      formu += "<option value='Asiatica'>Asiática</option>";
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
                  formu += "<div class='input-field col s12 m3 l3'>";
                      formu += "<input type='checkbox' class='filled-in' onchange='getAttrResidencia(this.checked,"+i+")' name='segunda_residencia"+i+"' id='segunda_residencia"+i+"' />";
                      formu += "<label  for='segunda_residencia"+i+"'>Segunda Residencia</label>";
                  formu += "</div>";
              formu += "</div>";
        formu += "</div>"
        ;


        z = document.createElement('div');
        z.innerHTML = formu;

        document.getElementById('USER').appendChild(z);
      }



    });
