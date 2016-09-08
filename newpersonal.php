<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de Personal</title>
</head>
<body>
	 <form action="index.php?page=personal&accion=regis" id="formulario" method="POST">
	 	 <table border="0" >
	 	 	<tr>
	 	 		<td><label>Nombre</label></td> <td><input type="text" id="nom" name="nom"  onkeyup="validar(this.value,'nom');" ></td>

	 	 	</tr>
	 	    <tr>
	 	 		<td><label>Apellido Paterno</label></td> <td><input type="text"  maxlength="8" id="apepa" name="apepa" onkeydown="return validarLetras(event)"></td>

	 	 	</tr>
	 	 	<tr>
	 	 		<td><label>Apellido Materno</label></td> <td><input type="text" id="apema" name="apema"></td>

	 	 	</tr>
	 	 	
       			<td><input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
       			 <input type="file" name="file_upload" value=""/></td>
       			<!-- <input type="submit" name="submit" value="Subir Archivo">-->
	 	 	<tr>
	 	 		<td><input type="button" id="btnregistrar" name="btnregistrar" value="Enviar Datos" onclick="insertarajax()"></td>

	 	 	</tr>
	 	 	
	 	 </table>
                <input type="text" id="idper" name="idper">
	 </form>
	
         <div id="tblclientes"></div>

	 <!--<table border="1px">
	 	 <tr>
	 	 <th>Nombre</th>
	 	 <th>Apellido Paterno</th>
	 	 <th>apellido Materno</th>
	 	 </tr>
	 	 	 </td> <!--aqui listo los elementos de acuerdo a los atributos de la tabla-->
	 	 <!--	 <?php //foreach ($lempleados as $lcliente): ?>
	 	 	 <tr id="<?php // echo $lcliente->idpersonal;?>">
			  <td> <?php //echo utf8_encode($lcliente->nombre); ?></td>
			  <td> <?php //echo utf8_encode($lcliente->apellidopa); ?></td>
			  <td> <?php //echo utf8_encode($lcliente->apellidoma); ?></td>
			<?php //endforeach; ?>
	 	 </tr>
	 	 


	 </table>-->

	 <td>
	 	<ul>
	 		 <li>Primero</li>

	 	</ul>

	 	<ol>
	 		
	 	</ol>
	 
	 <a href="index.php?page=panel&accion=panel">cerrar</a>
	  <?php include "view/libreriasjquery.php";  ?>
       
</body>
</html>