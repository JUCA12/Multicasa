<?php
class Nuevo extends Controller{
    function __construct(){
        parent::__construct();
        //inicializa la variable mensaje
        $this -> view -> mensaje = "";
    }
    function render(){
        //reenderiza la vista especifica
        $this -> view ->render('admin/nuevo');
    }

    function registrarCasa(){

        $nombre = $_POST['txtnombre_casa'];
        $calle_num = $_POST['txtcalle_num'];
        $colonia = $_POST['txtcolonia'];
        $ciudad = $_POST['txtciudad'];
        $estado = $_POST['txtestado'];
        $cp = $_POST['txtcp'];
        $imagen = $_POST['img_image'];
        $precio = $_POST['txtprecio'];
        $recamaras = $_POST['txtrec'];
        $baños = $_POST['txtbaños'];

        $mensaje ="";
        //carga con el model el metodo insert para insertar en la base de datos y manda los parametros en un arreglo
        if($this -> model -> insert(['nombre' => $nombre, 
                                    'calle_num' => $calle_num,
                                    'colonia' => $colonia,
                                    'ciudad' => $ciudad,
                                    'estado' => $estado,
                                    'cp' => $cp,
                                    'imagen' => $imagen,
                                    'precio' => $precio,
                                    'recamaras' => $recamaras,
                                    'banos' => $baños])){
            $mensaje = "Nueva casa registrada";
        }else{
            $mensaje = "La casa ya existe";
        }
        //manda el mensaje por la vista 
        $this -> view -> mensaje = $mensaje;
        //manda a llamat la vista
        $this->render('admin/index');      
    }

}
?>