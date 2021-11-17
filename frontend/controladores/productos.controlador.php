<?php
class ControladorProductos
{
    /*=============================================
	MOSTRAR CATEGORIA
	=============================================*/
    static public function ctrMostrarCategorias($item, $valor){
        $tabla = "categorias";
        $respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;
    }
    /*=============================================
	MOSTRAR SUBCATEGORIA
	=============================================*/
    static public function ctrMostrarSubCategorias($item, $valor){
        $tabla = "subcategorias";
        $respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);
        return $respuesta;
    }
}