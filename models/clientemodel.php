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

    public function get_data($id){
        //creamos un objeto de la clase catalogo 
        $item = new Casa();
        //hacemos la peticion a la base de datos 
        $query = $this -> db-> connect() ->prepare("SELECT * FROM casa WHERE ID_CASA = :Id_casa");
        try{
            //ejecuta la peticion a la base de datos 
            $query -> execute(['Id_casa' => $id]);
            while($row = $query -> fetch()){
                // a las propiedades de catalogo las llenamos con la base de datos                
                $item -> casa_id = $row['Id_casa'];
                $item -> nombre = $row['Nombre'];
                $item -> calle_num = $row['CalleYNumero'];
                $item -> colonia = $row['Colonia'];
                $item -> ciudad = $row['Ciudad'];
                $item -> estado = $row['Estado'];
                $item -> cp = $row['CP'];
                $item -> imagen = $row['Imagen'];
                $item -> precio = $row['Precio'];
                $item -> recamaras = $row['recamaras'];
                $item -> baños = $row['baños'];
            }
            return $item;
        }catch(PDOExcexption $e){
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