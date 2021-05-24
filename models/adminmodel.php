<?php
include_once 'models/casa.php';    
class adminModel extends Model{
    function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            //se conecta a la base de datos y trae una consulta
            $query = $this -> db -> connect() -> query("SELECT * FROM casa");
            while($row = $query -> fetch()){
               //crea un objeto tipo catalogo  
                $item = new Casa();
                // a las propiedades de catalogo las llenamos con la base de datos
                $item -> casa_id = $row['Id_casa'];
                $item -> nombre = $row['Nombre'];
                $item -> calle_num = $row['CalleYNumero'];
                $item -> colonia = $row['Colonia'];
                $item -> ciudad = $row['Ciudad'];
                $item -> estado = $row['Estado'];
                $item -> cp = $row['CP'];
                $item -> precio = number_format($row['Precio'],3);
                $item -> recamaras = $row['recamaras'];
                $item -> baños = $row['baños'];

                // hace un push al arreglo 
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function getById($id){
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
        }catch(PDOException $e){
            return [];
        }
    }

    public function getBySearch($CP){
        //creamos un objeto de la clase catalogo 
        $item = new Casa();
        //hacemos la peticion a la base de datos 
        $query = $this -> db-> connect() ->prepare("SELECT * FROM casa WHERE CP = :cp");
        try{
            //ejecuta la peticion a la base de datos 
            $query -> execute(['CP' => $cp]);
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
                $item -> baños = $row['banos'];
            }
            return $item;
        }catch(PDOException $e){
            return [];
        }
    }

    public function update($item){
        //hacemos la peticion a la base de datos 
        $query = $this -> db-> connect() ->prepare("UPDATE casa SET Nombre = :nombre, CalleYNumero = :calle_num,Colonia = :colonia, Ciudad = :ciudad, Estado = :estado, CP = :cp, Imagen = :imagen, Precio = :precio, recamaras = :recamaras, baños = :banos WHERE Id_casa = :casa_id");
        try{
            //ejecuta la peticion a la base de datos 
            $query -> execute([
                'casa_id' => $item ['casa_id'],
                'nombre' => $item ['nombre'],
                'calle_num' => $item ['calle_num'],
                'colonia' => $item ['colonia'],
                'ciudad' => $item ['ciudad'],
                'estado' => $item ['estado'],
                'cp' => $item ['cp'],
                'imagen' => $item ['imagen'],
                'precio' => $item ['precio'],
                'recamaras' => $item ['recamaras'],
                'banos' => $item ['banos']
            ]);
           return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        //hacemos la peticion a la base de datos 
        $query = $this -> db-> connect() ->prepare("DELETE FROM casa WHERE Id_casa = :casa_id");
        try{
            //ejecuta la peticion a la base de datos 
            $query -> execute(['casa_id' => $id]);
           return true;
        }catch(PDOException $e){
            return false;
        }
    }

    }



?>