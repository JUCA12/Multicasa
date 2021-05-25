<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/estilos.css"><?php // echo constant es para usar url absolutas ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.min.css"><?php // echo constant es para usar url absolutas ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css"><?php // echo constant es para usar url absolutas ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.css"><?php // echo constant es para usar url absolutas ?>
    <title>Editar</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div id="main">
        <h1 class="center"><?php echo $this -> casa -> nombre; ?></h1>

        <div><?php echo $this -> mensaje; ?></div> 

        <form action="<?php echo constant('URL'); ?>admin/actualizarCasa" method="post" onsubmit="return valida_form_index();">
            <p>
                
                <label for="casa_id">Casas_ID:</label><br>
                <input type="text" name="txtcasa_id" disabled value ="<?php echo $this -> casa -> casa_id; ?>" id="txtcasa_id">
            </p>
            <p>
                <label for="nombre">Nombre:</label><br>
                <input type="text" name="txtnombre_casa" value ="<?php echo $this -> casa -> nombre; ?>" id="txtnombre_casa">
            </p>
            <p>
                <label for="calle_num">Calle y Número:</label><br>
                <input type="text" name="txtcalle_num" value ="<?php echo $this -> casa -> calle_num; ?>" id="txtcalle_num">
            </p>
            <p>
                <label for="colonia">Colonia:</label><br>
                <input type="text" name="txtcolonia" value ="<?php echo $this -> casa -> colonia; ?>" id="txtcolonia">
            </p>
            <p>
                <label for="ciudad">Ciudad:</label><br>
                <input type="text" name="txtciudad" value ="<?php echo $this -> casa -> ciudad; ?>" id="txtciudad">
            </p>
            <p>
                <label for="estado">Estado:</label><br>
                <input type="text" name="txtestado" value ="<?php echo $this -> casa -> estado; ?>" id="txtestado">
            </p>
            <p>
                <label for="cp">CP:</label><br>
                <input type="text" name="txtcp" value ="<?php echo $this -> casa -> cp; ?>" id="txtcp">
            </p>
            <p>
                <label for="imagen">Imagen :</label><br>
                <input type="file" name="img_image" value ="<?php echo $this -> casa -> imagen; ?>" id="img_image">
            </p>
            <p>
                <label for="precio">Precio:</label><br>
                <input type="text" name="txtprecio" value ="<?php echo $this -> casa -> precio; ?>" id="txtprecio">
            </p>
            <p>
                <label for="recamaras">Recamaras:</label><br>
                <input type="text" name="txtrec" value ="<?php echo $this -> casa -> recamaras; ?>" id="txtrec">
            </p>
            <p>
                <label for="baños">Baños:</label><br>
                <input type="text" name="txtbaños" value ="<?php echo $this -> casa ->baños; ?>" id="txtbaños">
            </p>

            
                <input type="submit" value="Editar">
            </p>

        </form>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>