$(document).ready(function () {
  $(".button-collapse").sideNav();
  quitarescudo();
});



function quitarescudo(){


  if (screen.width < 955) 
    document.getElementById('escudo-nav').style.display = "none";
}
