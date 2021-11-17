<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <meta name="title" content="Dulces Momentos">
    <meta name="description" content="Pasteleria de excelente calidad, con materia prima de primer nivel, delicias para tu vida.">
    <meta name="keyword" content="Pasteleria, tortas general rodriguez, dulces momentos tortas">
    <title>Dulces Momentos</title>
    <?php $icono = ControladorPlantilla::ctrEstiloPlantilla();
    echo '<link rel="icon" href="http://localhost/backend/'.$icono["icono"].'">';
    /*=============================================
	        Mantener Ruta Fija Proyecto
	=============================================*/
    $url = Ruta::ctrRuta();
    ?>
    <link rel="preconnect" href="<?php echo $url;?>https://fonts.googleapis.com">
    <link rel="preconnect" href="<?php echo $url;?>https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url;?>vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>vistas/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>vistas/css/plantilla2.css">
    <link rel="stylesheet" href="<?php echo $url;?>vistas/css/cabezote.css">
    <link rel="stylesheet" href="<?php echo $url;?>vistas/css/slide.css">
    <script src="<?php echo $url;?>vistas/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $url;?>vistas/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo $url;?>vistas/js/plugins/jquery.easing.js"></script>
</head>

<body>

    <?php
    /*=============================================
    Header
    =============================================*/
    include "modulos/cabezote.php";
    /*=============================================
    Contenido Dinamico
    =============================================*/
    $rutas = array();
    $ruta = null;

    if(isset($_GET["ruta"])){
        $rutas = explode("/", $_GET["ruta"]);
        $item = "ruta";
        $valor = $rutas[0];

        /*=============================================
        URL'S AMIGABLES DE CATEGORIAS
        =============================================*/

        $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);    
            if(empty($rutas[0]) == empty($rutaCategorias["ruta"])){
            $ruta = $rutas[0];
        }
        /*=============================================
        URL'S AMIGABLES DE SUBCATEGORIAS
        =============================================*/
        $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
        foreach ($rutaSubCategorias as $key => $value) {
            if($rutas[0] == $value["ruta"]){
                $ruta = $rutas[0];      
        }
        }
        /*=============================================
        LISTA BLANCA URL'S AMIGABLES
        =============================================*/
        if(empty($ruta) == null){
            include "modulos/productos.php";
        }else{
            
            include "modulos/error404.php";
        }
    }else{
        include "modulos/slide.php";
    }
    ?>
    <script src="<?php echo $url;?>vistas/js/cabezote.js"></script>
    <script src="<?php echo $url;?>vistas/js/plantilla.js"></script>
    <script src="<?php echo $url;?>vistas/js/slide.js"></script>

</body>

</html>