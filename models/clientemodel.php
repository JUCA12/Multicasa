<?php
include_once 'models/casa.php';    
class clienteModel extends Model{
    function __construct(){
        parent::__construct();
    }
    public function get($item){
        $items = [];
        $data = new Casa();
        $query = $this -> db -> connect() -> prepare("SELECT * from casa where :cep IN(CP,Ciudad,Estado) and Precio <= :rango_precios and recamaras <= :recamaras and baños <= :banos");
        try{
            //se conecta a la base de datos y trae una consulta
            $query -> execute([
                'cep' => $item ['cep'],
                'rango_precios' => $item ['rango_precios'],
                'recamaras' => $item ['recamaras'],
                'banos' => $item ['banos']]);
            while($row = $query -> fetch()){
               //crea un objeto tipo catalogo  
                // a las propiedades de catalogo las llenamos con la base de datos
                $data -> casa_id = $row['Id_casa'];
                $data -> nombre = $row['Nombre'];
                $data -> calle_num = $row['CalleYNumero'];
                $data -> colonia = $row['Colonia'];
                $data -> ciudad = $row['Ciudad'];
                $data -> estado = $row['Estado'];
                $data -> cp = $row['CP'];
                $data -> precio = number_format($row['Precio'],3);
                $data -> recamaras = $row['recamaras'];
                $data -> baños = $row['baños'];

                // hace un push al arreglo 
                array_push($items,$data);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    /*
    public function test($item){
        $items = [];
        $data = new Casa();
        $query = $this -> db -> connect() -> prepare("SELECT * from casa where :cep IN(CP,Ciudad,Estado) and Precio <= :rango_precios or recamaras <= :recamaras or baños <= :banos");
        try{
            //se conecta a la base de datos y trae una consulta
            $query -> execute(['cep' => $item['cep'],
                               'rango_precios' => $item['rango_precios'],
                               'recamaras' => $item['recamaras'],
                               'banos' => $item['banos']]);
                while($row = $query -> fetch()){
                    //crea un objeto tipo catalogo  
                     // a las propiedades de catalogo las llenamos con la base de datos
                     $data -> casa_id = $row['Id_casa'];
                     $data -> nombre = $row['Nombre'];
                     $data -> calle_num = $row['CalleYNumero'];
                     $data -> colonia = $row['Colonia'];
                     $data -> ciudad = $row['Ciudad'];
                     $data -> estado = $row['Estado'];
                     $data -> cp = $row['CP'];
                     $data -> precio = number_format($row['Precio'],3);
                     $data -> recamaras = $row['recamaras'];
                     $data -> baños = $row['baños'];
     
                     // hace un push al arreglo 
                     array_push($items,$data);
                 }
                 return $items;
             }catch(PDOException $e){
                 return [];
    }
     }*/
    }

?>