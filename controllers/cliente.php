<?php
class Cliente extends Controller{
    function __construct(){
        parent::__construct();
        $this ->view -> casas = [];
    }
     function render(){
        //reenderiza la vista especifica
        $this -> view ->render('cliente/index');
        
    }

    function verFicha($param = null){
        $casa_id = $param[0];
        //manda el parametro con el model a la funcion getById
        $casa = $this -> model -> get_data($casa_id);
        //crear una sesion para seguridad de datos
        session_start();
        //creamos una variable de session
        $_SESSION['id_verCasa'] = $casa -> casa_id;
        //carga el modelo en la vista 
        $this -> view -> casa = $casa;
        //cargar el mensaje en la vista 
        $this -> view -> mensaje ="";

        $this -> view ->render('cliente/ficha');

    }
    
    function searchById(){
        $cep = $_POST['txt_CEP'];
        $rango = $_POST['rango_precios'];
        $recs = $_POST['recamaras'];
        $baños = $_POST['banos'];

            if($this -> model -> get(['cep' => $cep, 'rango_precios' => $rango, 'recamaras' => $recs,'banos' => $baños])){
                $casas = $this -> model -> get(['cep' => $cep, 'rango_precios' => $rango, 'recamaras' => $recs,'banos' => $baños]);
                $this -> view-> casas= $casas;
                $this -> view -> mensaje = "Busqueda con resultados";
            }else{
                $this ->view ->mensaje = "Busqueda sin resultados";
            }        
            $this -> view -> render('cliente/index');
    }
    /*
    function test_model(){
        $cep = $_POST['txt_CEP'];
        $rango = $_POST['rango_precios'];
        $recs = $_POST['recamaras'];
        $baños = $_POST['banos'];

            $casa = $this -> model -> test(['cep' => $cep,
                                            'rango_precios' => $rango,
                                            'recamaras' => $recs,
                                            'banos' => $baños]);
            echo var_dump($casa);
    }*/
}

?>