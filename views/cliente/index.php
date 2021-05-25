<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multicasa</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.min.css"><?php // echo constant es para usar url absolutas ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/estilos.css"><?php // echo constant es para usar url absolutas ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css"><?php // echo constant es para usar url absolutas ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.css"><?php // echo constant es para usar url absolutas ?>
    
</head>
<body>
    <?php require 'views/header.php';
        
        ?>
        <div id="main">
            <div>
                <h1 style="color:white">Listado de Casas</h1>
            </div>
            <br><br>
            <div>
                <table width="100%" class="table">
                    <thead>
                        <tr style="color:white;font-size:bold">
                            <th>CASA ID</th>
                            <th>NOMBRE</th>
                            <th>CALLE Y NUMERO</th>
                            <th>COLONIA</th>
                            <th>CIUDAD</th>
                            <th>ESTADO</th>
                            <th>CP</th>
                            <th>PRECIO</th>
                            <th>RECAMARAS</th>
                            <th>BAÑOS</th>

                        </tr>   
                    </thead>
                    <tbody>
                        <?php //trae los objetos de catalogo y los muestra en una tabla 
                        include_once 'models/casa.php';
                        foreach($this -> casas as $row){
                            $casa = new Casa();
                            $casa = $row;
                            
                    ?>
                    <tr style="color:white">
                        <td><?php echo $casa -> casa_id;?></td>
                        <td><?php echo $casa -> nombre;?></td>
                        <td><?php echo $casa -> calle_num;?></td>
                        <td><?php echo $casa -> colonia;?></td>
                        <td><?php echo $casa -> ciudad;?></td>
                        <td><?php echo $casa -> estado;?></td>
                        <td><?php echo $casa -> cp;?></td>
                        <td><?php echo $casa -> precio;?></td>
                        <td style="text-align:center;"><?php echo $casa -> recamaras;?></td>
                        <td style="text-align:center;"><?php echo $casa -> baños;?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php require 'views/menu.php'; ?>
        </div>
        </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>