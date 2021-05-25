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