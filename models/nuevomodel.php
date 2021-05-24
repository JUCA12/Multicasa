<?php
include_once 'models/casa.php';    
class nuevoModel extends Model{
    function __construct(){
        parent::__construct();
    }

    public function insert($data){
        try{
            //manda a llamar la base de datos
             $query = $this -> db -> connect() -> prepare('INSERT INTO casa (Nombre,CalleYNumero,Colonia,Ciudad,Estado,CP,Imagen,Precio,recamaras,baños) VALUES(:nombre,:calle_num,:colonia,:ciudad,:estado,:cp,:imagen,:precio,:recamaras,:banos)');
             //ejecuta lo preparado 
             $query -> execute ([
                'nombre' => $data ['nombre'],
                'calle_num' => $data ['calle_num'],
                'colonia' => $data ['colonia'],
                'ciudad' => $data ['ciudad'],
                'estado' => $data ['estado'],
                'cp' => $data ['cp'],
                'imagen' => $data ['imagen'],
                'precio' => $data ['precio'],
                'recamaras' => $data ['recamaras'],
                'banos' => $data ['banos']
            ]);
             return true;  
        }catch(PDOException $e) {
             //echo "ya existe esa RFC";
             return false;
        }

    }

}
?>