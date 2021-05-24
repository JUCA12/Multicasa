<?php
class Admin extends Controller{
    function __construct(){
        parent::__construct();
        $this ->view -> casas = [];
    }
     function render(){
        //trae el metodo get con el model 
        $casa = $this ->model-> get();
        //manda los datos del model a la vista 
        $this ->view -> casas = $casa;
        
        //reenderiza la vista especifica
        $this -> view ->render('admin/index');
        
    }
    function saludo(){
        echo "<p>Nuevo saludo</p>";
    }

    function verCasa($param = null){
        //var_dump($param);
        //metemos el parametro que se pide en una variable
        $casa_id = $param[0];
        //manda el parametro con el model a la funcion getById
        $casa = $this -> model -> getById($casa_id);
        //crear una sesion para seguridad de datos
        session_start();
        //creamos una variable de session
        $_SESSION['id_verCasa'] = $casa -> casa_id;
        //carga el modelo en la vista 
        $this -> view -> casa = $casa;
        //cargar el mensaje en la vista 
        $this -> view -> mensaje ="";
        //carga la vista de detalle 
        $this -> view ->render('admin/detalle');
    }

    
    function actualizarCasa(){
        //crear una sesion para seguridad de datos
        session_start();
        //utilizamos los valores del formulario y la sesion
        $casa_id = $_SESSION['id_verCasa'];
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
        //destruir sesion
        unset($_SESSION['id_verCasa']);

        if($this -> model -> update(['casa_id' => $casa_id, 
                                    'nombre' => $nombre, 
                                    'calle_num' => $calle_num,
                                    'colonia' => $colonia,
                                    'ciudad' => $ciudad,
                                    'estado' => $estado,
                                    'cp' => $cp,
                                    'imagen' => $imagen,
                                    'precio' => $precio,
                                    'recamaras' => $recamaras,
                                    'banos' => $baños])){
            //actualliza catalogo
            $casa = new Casa();
            $casa-> casa_id = $casa_id;
            $casa -> nombre = $nombre;
            $casa -> calle_num = $calle_num;
            $casa -> colonia = $colonia;
            $casa -> ciudad = $ciudad;
            $casa -> estado = $estado;
            $casa -> cp = $cp;
            $casa -> imagen = $imagen;
            $casa -> precio = $precio;
            $casa -> recamaras = $recamaras;
            $casa -> baños = $baños;
            $this -> view -> casa = $casa;
            $this -> view -> mensaje = "Curso actualizado correctamente";

        }else{
            //error al actualizar catalogo
            $this -> view -> mensaje = "Curso no actualizado ";
        }
        $this -> view -> render('admin/detalle');
    }

    function eliminarCasa($param = null){
        $casa_id = $param[0];
        if($this -> model -> delete($casa_id)){
            $this -> view -> mensaje = "Casa eliminado correctamente";
        }else{
            $this -> view -> mensaje = "Casa no eliminada ";
        }
        $this ->render('admin/index');
    }

   
}
?>