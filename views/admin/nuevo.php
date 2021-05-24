<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/estilos.css"><?php // echo constant es para usar url absolutas ?>
    <title>Editar</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div id="main">
        <h1>Registro de Vivienda</h1>

        <div class="center"><?php echo $this -> mensaje; ?></div> 

        <form action="<?php echo constant('URL'); ?>nuevo/registrarCasa" method="post">
            <p>
                
                <label for="casa_id">Casas_ID:</label><br>
                <input type="text" name="txtcasa_id" disabled id="txtcasa_id">
            </p>
            <p>
                <label for="nombre">Nombre:</label><br>
                <input type="text" name="txtnombre_casa" placeholder="Ingrese el nombre de la vivienda..." id="txtnombre_casa">
            </p>
            <p>
                <label for="calle_num">Calle y Número:</label><br>
                <input type="text" name="txtcalle_num" placeholder="Ingrese la dirección" id="txtcalle_num">
            </p>
            <p>
                <label for="colonia">Colonia:</label><br>
                <input type="text" name="txtcolonia" placeholder="Ingrese la colonia..." id="txtcolonia">
            </p>
            <p>
                <label for="ciudad">Ciudad:</label><br>
                <input type="text" name="txtciudad" placeholder="Ingrese la ciudad..." id="txtciudad">
            </p>
            <p>
                <label for="estado">Estado:</label><br>
                <input type="text" name="txtestado" placeholder="Ingrese el estado...." id="txtestado">
            </p>
            <p>
                <label for="cp">CP:</label><br>
                <input type="text" name="txtcp" placeholder="Ingrese el codigo postal..." id="txtcp">
            </p>
            <p>
                <label for="imagen">Imagen :</label><br>
                <input type="file" name="img_image" id="img_image">
            </p>
            <p>
                <label for="precio">Precio:</label><br>
                <input type="text" name="txtprecio" placeholder="Ingrese el precio" id="txtprecio">
            </p>
            <p>
                <label for="recamaras">Recamaras:</label><br>
                <input type="text" name="txtrec" placeholder="Ingrese el número de recamaras..." id="txtrec">
            </p>
            <p>
                <label for="baños">Baños:</label><br>
                <input type="text" name="txtbaños" placeholder="Ingrese el número de baños" id="txtbaños">
            </p>

                <input type="submit" value="Registrar">
            </p>

        </form>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>