$(document).ready(function(){
    $('ul.tabs').tabs();
});

iCnt = iCnt + 1;

// Añadir caja de texto.
$(container).append('<input type=text class="input" id=tb' + iCnt + ' ' +
'value="Elemento de Texto ' + iCnt + '" />');

if (iCnt == 1) {

var divSubmit = $(document.createElement('div'));
$(divSubmit).append('<input type=button class="bt" onclick="GetTextValue()"' +
'id=btSubmit value=Enviar />');

}
