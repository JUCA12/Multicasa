<?php 
    session_start();
    require 'database.php'; 
    
     if (!empty($_POST['txtuser']) && !empty($_POST['txtpassword'])) {
        $records = $conn->prepare('SELECT id_Usuario, Nombre,Password,Privilegios FROM usuario WHERE Nombre = :nombre');
        $records->bindParam(':nombre', $_POST['txtuser']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        $message = "";
        if(count($results) > 0 && $_POST['txtpassword'] ==  $results['Password']){
            $_SESSION['id_usuario'] = $results['id_Usuario'];
            $_SESSION['nombre'] = $results['Nombre'];
            $_SESSION['privilegios'] = $results['Privilegios'];
            
            if($_SESSION['privilegios']=='A'){
                header('Location: http://localhost/multicasa/admin');
            }else{
                header('Location: http://localhost/multicasa/main');
            }
        }else{
            $message = "credenciales no validas";
        }
        

     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>

    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.min.css"><?php // echo constant es para usar url absolutas ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css"><?php // echo constant es para usar url absolutas ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.css"><?php // echo constant es para usar url absolutas ?>
    
</head>
<body>
    <?php require 'views/header.php'; ?>
        <div id="main">
        <center>
        <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
        <?php endif; ?>

        

            <form action="<?php echo constant('URL'); ?>login" method="post">
                <br><br><br><br><br><br>
                <label for="txtuser" style="color:white;font-size:18px">Usuario:</label>
                <br>
                <input type="text" name="txtuser" id="txtuser" placeholder="Introducir Usuario..." required >
                <br>
                <label for="txtuser" style="color:white;font-size:18px">Contraseña:</label>
                <br>
                <input type="password" name="txtpassword" id="txtpassword" placeholder="Introducir Contraseña..." required >
                <br>
                <input type="submit" value = "Entrar" style="color:white;font-size:18px;font-weight:bold">
            </form>
            </center>
            <?php require 'views/menu.php'; ?>
        </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>