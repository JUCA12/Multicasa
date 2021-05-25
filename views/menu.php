<form action="cliente/searchById" method="post">
<div id="lateral">
        <div id= "botones_lateral"> 
            <ul class="botones_lateral">
                <li><a href="<?php echo constant('URL'); ?>main">Inicio</a></li>
                <li><a href="<?php echo constant('URL'); ?>compra">Compra</a></li>
                <li><a href="<?php echo constant('URL'); ?>construir">Construir</a></li>
                <li><a href="<?php echo constant('URL'); ?>venta">Venta</a></li>
                <li><a href="<?php echo constant('URL'); ?>mudanza">Mudanzas</a></li>
                <li><a href="<?php echo constant('URL'); ?>seguros">Seguros</a></li>
                <li><a href="<?php echo constant('URL'); ?>contactos">Contactos</a></li>
            </ul>
        </div>
        <div id="busqueda">
            <div id="lupa">
                <img src="<?php echo constant('URL'); ?>public/img/lupa.png" >
                <img src="<?php echo constant('URL'); ?>public/img/encuentra.png" >
            </div>
            <div id="sombra_lateral">
                <img src="<?php echo constant('URL'); ?>public/img/sombra_lateral.png">
            </div>
            <center>    
            <form action="" method="post">
            <div id="campos">
                <label for="cp">Ciudad y estado, o CP</label>
                <input type="text" name="txt_CEP" placeholder="Ingrese Ciudad, Estado o CP" id="txt_CEP">
                <br>

                <label for="rango">Rango de precio DE: A:</label>
                <br>
                 <select name="rango_precios" id="rango_precios">   
                    <option value="400.000">$250.000 a $400.000</option>
                    <option value="900.000">$450.000 a $900.000</option>
                    <option value="1.200.000">$900.000 a $1.200.000</option>
                </select>
                <br>

                <label for="recamaras">Recamaras</label>
                <br>
                 <select name="recamaras" id="recamaras">
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                
                <label for="banos">Baños</label>
                <br>
                 <select name="banos" id="banos">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <br>
                <input type="submit" id ="btnbuscar" value="Buscar">
            </div>
            </form>
            </center>
            <div id= "informacion">
                <h3>informacion de Ultíma Hora</h3>
                <p>nuevo convenvio a casas ecologicas <a href="">ver más</a></p>
                <p>conoce nuestro planes <a href="">ver más</a></p>

            </div>
            <div id="conectados">
                <img src="<?php echo constant('URL'); ?>public/img/conectados.png" alt="">Conectados:
                <br>
                <img src="<?php echo constant('URL'); ?>public/img/img_visitas.png" alt="">Visitas:
            </div>
        </div>
</div>
</form>