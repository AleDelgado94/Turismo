$(document).ready(function() {
  updateFondo();
  // Y tambien cada vez que se redimensione el navegador
  $(window).bind("resize", function() {
    updateFondo();
  });
  $(".button-collapse").sideNav();
  $('select').material_select();

});

function updateFondo(){
  sizeWidth = $(window).width();
  sizeHeight = $(window).height();

  var fondo = jQuery("#imagen-fondo");

  var ratio=1;
  if(sizeWidth/sizeHeight > ratio){
    $(fondo).height("100%");
    $(fondo).width("auto");
  } else {
    $(fondo).height("auto");
    $(fondo).width("100%");
  }

  // Si a la imagen le sobra anchura, la centramos a mano
  if ($(fondo).width() > 0) {
    $(fondo).css('left', (sizeWidth - $(fondo).width()) / 2);
  }
};

/*var usuarios = getElementById('users');
var user = getElementById('user');

//function select_user(){
  user.value = usuarios.options[usuarios.selectedIndex].value;
//}*/


function ofi(val) {
  document.getElementById('oficina').value = val;
}


function place(val){
  document.getElementById('lugar').value = val;
}
