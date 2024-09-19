<!DOCTYPE html>
<html>
<head>
    <title>Traductor</title>
</head>
<body>
    <form action="diccionario.php" method="post">
    <h1>TRADUCTOR ENTRE IDIOMAS</h1>
    <fieldset>
        <legend>Selecciona los países potenciales de los cuales deseas traducir:</legend>
        <input type="checkbox" name="idioma[]" value="Espanol" >España<br>
        <input type="checkbox" name="idioma[]" value="Aleman" >Alemania<br>
        <input type="checkbox" name="idioma[]" value="Frances" >Francia<br>
        <input type="checkbox" name="idioma[]" value="Ingles" >Inglaterra<br>
        <input type="checkbox" name="idioma[]" value="Italiano" >Italia<br>
       
        <input type="submit" name="listar" value="Listar países">
    </fieldset>
    <br>
	<br>
	<fieldset>
        <legend>Selecciona el país cuya BD de palabras deseas cargar:</legend>
        <select size="5" name="pais_bd">
            <?php

            if (isset($_POST['idioma'])) {
                foreach ($_POST['idioma'] as $pais) {
                    echo "<option value=\"$pais\">$pais</option>";
                }
            }
            ?>
        </select>
		<br>
		<br>
        <input type="submit" name="selec" value="Seleccion Pais">
    </fieldset>
	<br>
	<br>
	  <fieldset>
          <?php
	
	if(isset($_POST['pais_bd'])) {
  
    $con=mysqli_connect("localhost","root","","test") or die("Problemas con la conexión a la base de datos");

  
    $pais_seleccionado = mysqli_real_escape_string($con, $_POST['pais_bd']);

    $consulta = "SELECT $pais_seleccionado FROM diccionario";

  
    $registros=mysqli_query($con, $consulta) or die(mysqli_error($con));

  
    if (mysqli_num_rows($registros) > 0) {
        echo '<select size="8" name="palabras">';
        while ($fila = mysqli_fetch_array($registros)) {
            echo "<option value=\"" . $fila[$pais_seleccionado] . "\">" . $fila[$pais_seleccionado] . "</option>";
        }
        echo '</select>';
    } else {
        echo "No se encontraron palabras en la base de datos.";
    }

   
    mysqli_close($con);
}
?>
			
        </fieldset>
		<br>
        <fieldset>
            <legend>Indique el idioma al que desea traducir la palabra elegida:</legend>
            <input type="radio" name="idioma" value="español" >Español<br>
            <input type="radio" name="idioma" value="aleman">Aleman<br>
            <input type="radio" name="idioma" value="frances">Frances<br>
            <input type="radio" name="idioma" value="ingles">Ingles<br>
            <input type="radio" name="idioma" value="italiano">Italiano<br>
        </fieldset>
        <br>
		<br>
        <input type="submit" name="enviar" value="Traducir">
		<?php

if(isset($_POST['pais_bd']) && isset($_POST['palabra_seleccionada']) && isset($_POST['idioma_destino'])) {
   
    $con=mysqli_connect("localhost","root","","test") or die("Problemas con la conexión a la base de datos");

 
    $pais_seleccionado = mysqli_real_escape_string($con, $_POST['pais_bd']);
    $palabra_seleccionada = mysqli_real_escape_string($con, $_POST['palabra_seleccionada']);
    $idioma_destino = mysqli_real_escape_string($con, $_POST['idioma_destino']);

    $consulta = "SELECT $idioma_destino FROM diccionario WHERE $pais_seleccionado = '$palabra_seleccionada'";
	
    $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));

    
    if(mysqli_num_rows($resultado) > 0) {
     
        $fila = mysqli_fetch_array($resultado);
        $traduccion = $fila[$idioma_destino];
		
		echo "<table border='1'>";
		echo "<tr>Traduccion de $pais_seleccionado a otros idiomas</tr>";
        echo "<tr><th>$idioma</th><th>$idioma_destino</th></tr>";
        echo "<tr><td>$palabra_seleccionada</td><td>$traduccion</td></tr>";
        echo "</table>";
    } else {
        echo "No se encontró traducción para la palabra seleccionada en el idioma destino.";
    }

    mysqli_close($con);
}
?>
</form>
</body>
</html>
