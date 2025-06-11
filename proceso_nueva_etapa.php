<?php
    require_once('controlador/cEtapas.php');

    //llamada al metodo del controlador de etapas para añadir una etapa
    $objEtapa=new CEtapas();
    $mensaje=$objEtapa->insertar_etapa();

    //vista para mostrar el mensaje
    include('vista/v_mensaje_Etapa.php');
?>