<?php

$link = require("../connect_db.php");



//MUNICIPIO
$cant_callejero_municipio = $_POST['cant_callejero_municipio'];
$cant_mapa_senderos_municipio = $_POST['cant_mapa_senderos_municipio'];
$cant_guias_turisticas_municipio = $_POST['cant_guias_turisticas_municipio'];
$cant_folleto_eventos_municipales_municipio = $_POST['cant_folleto_eventos_municipales_municipio'];
$cant_folleto_ocio_municipio = $_POST['cant_folleto_ocio_municipio'];


//OTROS MUNICIPIOS
$cant_callejero_otros_municipios = $_POST['cant_callejero_otros_municipios'];
$cant_folleto_ocio_otros_municipios = $_POST['cant_folleto_ocio_otros_municipios'];
$cant_otros_otros_municipios = $_POST['cant_otros_otros_municipios'];

//DE OTRAS ISLAS
$cant_mapas_islas_otras_islas = $_POST['cant_mapas_islas_otras_islas'];
$cant_otros_islas_otras_islas = $_POST['cant_otros_islas_otras_islas'];

//TURISMO TENERIFE
$cant_mapa_tenerife_turismo_tenerife = $_POST['cant_mapa_tenerife_turismo_tenerife'];
$cant_mapa_block_sur_turismo_tenerife = $_POST['cant_mapa_block_sur_turismo_tenerife'];
$cant_tenerife_coche_turismo_tenerife = $_POST['cant_tenerife_coche_turismo_tenerife'];
$cant_tradiciones_tenerife_turismo_tenerife = $_POST['cant_tradiciones_tenerife_turismo_tenerife'];
$cant_tenerife_pie_turismo_tenerife = $_POST['cant_tenerife_pie_turismo_tenerife'];
$cant_tenerife_cetaceos_turismo_tenerife = $_POST['cant_tenerife_cetaceos_turismo_tenerife'];
$cant_guia_de_tenerife_turismo_tenerife = $_POST['cant_guia_de_tenerife_turismo_tenerife'];
$cant_gastronomia_tenerife_turismo_tenerife = $_POST['cant_gastronomia_tenerife_turismo_tenerife'];
$cant_tenerife_natural_rural_turismo_tenerife = $_POST['cant_tenerife_natural_rural_turismo_tenerife'];
$cant_tenerife_familia_turismo_tenerife = $_POST['cant_tenerife_familia_turismo_tenerife'];

//MATERIAL PROMOCIONAL
$cant_periodico_revista_material_promocional = $_POST['cant_periodico_revista_material_promocional'];
$cant_folleto_bus_material_promocional = $_POST['cant_folleto_bus_material_promocional'];
$cant_otros_promocional_material_promocional = $_POST['cant_otros_promocional_material_promocional'];







  if ($_POST['add_cant']) {
    # si se desea añadir al STOCK

    //MUNICIPIO
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad + ".$cant_callejero_municipio." WHERE material = 'callejero';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad + ".$cant_folleto_eventos_municipales_municipio." WHERE material = 'folleto_eventos_municipales';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad + ".$cant_folleto_ocio_municipio." WHERE material = 'folleto_ocio';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad + ".$cant_guias_turisticas_municipio." WHERE material = 'guias_turisticas';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad + ".$cant_mapa_senderos_municipio." WHERE material = 'mapa_senderos';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    //OTROS MUNICIPIOS
    $consulta = "UPDATE stock_otros_municipios SET cantidad = cantidad + ".$cant_callejero_otros_municipios." WHERE material = 'callejero'; ";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otros_municipios SET cantidad = cantidad + ".$cant_folleto_ocio_otros_municipios." WHERE material = 'folleto_ocio'; ";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otros_municipios SET cantidad = cantidad + ".$cant_otros_otros_municipios." WHERE material = 'otros'; ";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    //DE OTRAS ISLAS
    $consulta = "UPDATE stock_otras_islas SET cantidad = cantidad + ".$cant_mapas_islas_otras_islas." WHERE material = 'mapas'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otras_islas SET cantidad = cantidad + ".$cant_otros_islas_otras_islas." WHERE material = 'otros'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    //TURISMO TENERIFE
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_gastronomia_tenerife_turismo_tenerife." WHERE material = 'gastronomia_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_guia_de_tenerife_turismo_tenerife." WHERE material = 'guia_de_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_mapa_block_sur_turismo_tenerife." WHERE material = 'mapa_block_sur'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_mapa_tenerife_turismo_tenerife." WHERE material = 'mapa_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_tenerife_cetaceos_turismo_tenerife." WHERE material = 'tenerife_cetaceos'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_tenerife_coche_turismo_tenerife." WHERE material = 'tenerife_coche'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_tenerife_familia_turismo_tenerife." WHERE material = 'tenerife_familia'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_tenerife_natural_rural_turismo_tenerife." WHERE material = 'tenerife_natural_rural'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_tenerife_pie_turismo_tenerife." WHERE material = 'tenerife_pie'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad + ".$cant_tradiciones_tenerife_turismo_tenerife." WHERE material = 'tradiciones_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    //MATERIAL PRIMOCIONAL
    $consulta = "UPDATE stock_promocional SET cantidad = cantidad + ".$cant_folleto_bus_material_promocional." WHERE material = 'folleto_bus'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_promocional SET cantidad = cantidad + ".$cant_otros_promocional_material_promocional." WHERE material = 'otros_promocional'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_promocional SET cantidad = cantidad + ".$cant_periodico_revista_material_promocional." WHERE material = 'periodico_revista'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    header("Location: stock.php");





  }elseif ($_POST['delete_cant']) {
    # eliminar del STOCK
    //MUNICIPIO
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$cant_callejero_municipio." WHERE material = 'callejero';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$cant_folleto_eventos_municipales_municipio." WHERE material = 'folleto_eventos_municipales';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$cant_folleto_ocio_municipio." WHERE material = 'folleto_ocio';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$cant_guias_turisticas_municipio." WHERE material = 'guias_turisticas';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$cant_mapa_senderos_municipio." WHERE material = 'mapa_senderos';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    //OTROS MUNICIPIOS
    $consulta = "UPDATE stock_otros_municipios SET cantidad = cantidad - ".$cant_callejero_otros_municipios." WHERE material = 'callejero'; ";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otros_municipios SET cantidad = cantidad - ".$cant_folleto_ocio_otros_municipios." WHERE material = 'folleto_ocio'; ";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otros_municipios SET cantidad = cantidad - ".$cant_otros_otros_municipios." WHERE material = 'otros'; ";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    //DE OTRAS ISLAS
    $consulta = "UPDATE stock_otras_islas SET cantidad = cantidad - ".$cant_mapas_islas_otras_islas." WHERE material = 'mapas'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otras_islas SET cantidad = cantidad - ".$cant_otros_islas_otras_islas." WHERE material = 'otros'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    //TURISMO TENERIFE
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_gastronomia_tenerife_turismo_tenerife." WHERE material = 'gastronomia_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_guia_de_tenerife_turismo_tenerife." WHERE material = 'guia_de_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_mapa_block_sur_turismo_tenerife." WHERE material = 'mapa_block_sur'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_mapa_tenerife_turismo_tenerife." WHERE material = 'mapa_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_tenerife_cetaceos_turismo_tenerife." WHERE material = 'tenerife_cetaceos'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_tenerife_coche_turismo_tenerife." WHERE material = 'tenerife_coche'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_tenerife_familia_turismo_tenerife." WHERE material = 'tenerife_familia'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_tenerife_natural_rural_turismo_tenerife." WHERE material = 'tenerife_natural_rural'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_tenerife_pie_turismo_tenerife." WHERE material = 'tenerife_pie'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$cant_tradiciones_tenerife_turismo_tenerife." WHERE material = 'tradiciones_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    //MATERIAL PRIMOCIONAL
    $consulta = "UPDATE stock_promocional SET cantidad = cantidad - ".$cant_folleto_bus_material_promocional." WHERE material = 'folleto_bus'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_promocional SET cantidad = cantidad - ".$cant_otros_promocional_material_promocional." WHERE material = 'otros_promocional'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_promocional SET cantidad = cantidad - ".$cant_periodico_revista_material_promocional." WHERE material = 'periodico_revista'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

    header("Location: stock.php");


  }


 ?>
