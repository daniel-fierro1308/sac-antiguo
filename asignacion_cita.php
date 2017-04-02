<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Asignar Cita</title>
<link href="responsive/asignacion_cita/boilerplate.css" rel="stylesheet" type="text/css">
<link href="responsive/asignacion_cita/asigancion_estilos.css" rel="stylesheet" type="text/css">
<!-- 
Para obtener m?s informaci?n sobre los comentarios condicionales situados alrededor de las etiquetas html en la parte superior del archivo:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/
  
Haga lo siguiente si usa su compilaci?n personalizada de modernizr (http://www.modernizr.com/):
* inserte el v?nculo del c?digo js aqu?
* elimine el v?nculo situado debajo para html5shiv
* a?ada la clase "no-js" a las etiquetas html en la parte superior
* tambi?n puede eliminar el v?nculo con respond.min.js si ha incluido MQ Polyfill en su compilaci?n de modernizr 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="responsive/asignacion_cita/respond.min.js"></script>
<script src="responsive/asignacion_cita/efecto.js"></script>
<link rel="icon" type="image/gif" href="imagenes/animated_favicon1.gif"/>
</head>
<body>

<?php  
include ("header login.php");            
?>

<div class="gridContainer clearfix">

<?php 
session_start(); 
include_once "conexion.php";
           
?>

<?php 

 if(isset($_SESSION['session_username'])) {
	  

if(isset($_POST['enviar'])) 
{ 
    if(!empty($_POST['consultorio'])  or !empty($_POST['fecha_cita'])  or !empty($_POST['hora_cita'])) 
    { 
 
        $sql = 'SELECT * FROM citas'; 
        $rec = mysql_query($sql);
		
		$verificar_cita = 0;
		$verificar_consultorio = 0;
        $verificar_hora = 0; 
		$verificar_fecha = 0;
		$verificar_paciente = 0;
		
   while($result = mysql_fetch_object($rec)) 
        { 
		if($result-> tipo_cita == $_POST['tipo_cita']){
				$verificar_cita = 1;
				}
		
		 if($result->fecha_cita == $_POST['fecha_cita']) 
            { 
                $verificar_fecha = 1; 
            } 
			
			if($result-> hora == $_POST['hora_cita']){
				$verificar_hora = 1;
				}
				
				if($result-> consultorio == $_POST['consultorio']){
				$verificar_consultorio = 1;
				}

				if($result-> paciente == $_SESSION['session_username']){
				$verificar_paciente = 1;
				}
				
		}
		
		
		 if( $verificar_cita == 0 && $verificar_consultorio == 0 && $verificar_hora == 0 or $verificar_fecha == 0){
		 	if($verificar_paciente == 0) {
			  $tipo_cita = $_POST['tipo_cita'];
			  $consultorio = $_POST['consultorio'];
				$fecha_cita = $_POST['fecha_cita'];
				$hora_cita = $_POST['hora_cita'];
				$medico = $_POST['medico'];
				$odontologo = $_POST['odontologo'];
				$usuario_documento = $_SESSION['session_username'];
				
				if($tipo_cita == 'Medicina general'){
					 $sqli = "INSERT INTO citas (tipo_cita,fecha_cita,hora,medico,consultorio,paciente,estado) VALUES ('$tipo_cita','$fecha_cita','$hora_cita','$medico','$consultorio','$usuario_documento','No cancelado')";
                mysql_query($sqli); 
          header("Location:mensaje cita.html");   	  
					}
					
					
					else{	
                $sql = "INSERT INTO citas (tipo_cita,fecha_cita,hora,medico,consultorio,paciente,estado) VALUES ('$tipo_cita','$fecha_cita','$hora_cita','$odontologo','$consultorio','$usuario_documento','No cancelado')";
                mysql_query($sql); 
          header("Location:mensaje cita.html");
					}
					
			 }
			 
             else{

             	$message = 'Se&ntilde;or usuario usted ha solicitado una cita anteriormente por favor vuelva a solicitar una cuando haya asistido a la programada anteriormente Gracias.';
             }
			 

			}
             else{
				 
				 $message = 'Su cita no se ha podido solicitar por favor revise la fecha y la hora Gracias.';
  
				 }  	              
	}
	else{
		$message = "Por Favor complete los campos";
		}
}


					
 ?>
 <?php if (!empty($message)) {echo "<p class=\"defecto\">" . $message . "</p>";} 
?>

<script> 
function visible(dato){ 

 document.forms.cita.medico.style.display = (dato == "Odontologia") ? "none" : "inline"; 
 document.forms.cita.odontologo.style.display = (dato == "Medicina general") ? "none" : "inline"; 
 document.forms.cita.medico.disabled = (dato == "Odontologia") ? true : false; 
 document.forms.cita.odontologo.disabled = (dato == "Medicina general") ? true : false; 
}
</script> 

<section align="center"> 
<a href="#" onclick="mostrarm()" style="text-decoration:none" title="Clic Aqui!"><h3 align="center" style="margin-top:10%; color:#069">SOLICITUD CITA M&EacuteDICA</h3></a>
<br>
<div id='oculto' style='display:none; margin-top:4%'>
Aqu&iacute usted podra solicitar su cita m&eacutedica, aqui encontrara un formulario que debera diligenciar con las caracteristicas de su cita.
<br><br>
En la parte inferior encontrar&aacute; la tabla con las citas que se encuentren disponibles hasta el momento por favor solicite su cita m&eacute;dica de acuerdo a la tabla.
<br><br>
Diligencie el formulario que aparece all&iacute; y asi posteriormente agendar su cita m&eacutedica.
<br><br>
Luego de haber agendado su cita m&eacutedica se generara el comprobante de dicha cita, el cual deber&aacute descargar para tener constancia de la solicitud de su cita.


<br>

</div>
<br>
 </section>
 
<form action="" method="post" class="asignar" name="cita">
<h1><img src="imagenes/logo1.png" style="margin-right:5%">Pide tu Cita</h1>
 
<div><label>Tipo de Cita</label>
<select name="tipo_cita"  onchange="visible(this.value)">
<option value="Medicina general">Medicina General</option>
<option value="Odontologia">Odontologia</option>
</select></div>

<div>
<label> Consultorio: </label>
<select name="consultorio">
<option value="">...</option>
<option value="1">Consultorio  1</option>
<option value="2">Consultorio  2</option>
<option value="3">Consultorio  3</option>
<option value="4">Consultorio  4</option>
<option value="5">Consultorio  5</option>
</select>
</div> 


<div><label>Fecha de la Cita:</label> 
<input type="date"  name="fecha_cita"></div>


<div><label>Hora de la Cita:</label> 
<input type="time"  name="hora_cita"></div>

<div>
<label>M&eacute;dico</label>

<select name="medico">
<?php
$consulta = 'SELECT Nombres, Apellidos FROM funcionarios WHERE cargo = "Medico general"';
$resultado = mysql_query ($consulta,$con);
?>
<?php
while($fila= mysql_fetch_array($resultado)){
echo "<option value='".$fila['Nombres'] , $fila['Apellidos']."'> ".$fila['Nombres'],$fila['Apellidos']."</option>";

	}
?>
</select>


<select name="odontologo" style="display: none" id="odontologo">
<?php
$consulta = 'SELECT Nombres, Apellidos FROM funcionarios WHERE cargo = "odontologo"';
$resultado = mysql_query ($consulta,$con);
?>
<?php
while($fila= mysql_fetch_array($resultado)){
echo "<option value='".$fila['Nombres'] , $fila['Apellidos']."'> ".$fila['Nombres'],$fila['Apellidos']."</option>";

	}
?>
</select>

</div>


<div> 
<input type="submit" name="enviar" value="Pedir Cita">
</div>



</form> 




<?php 
 
 }
 
 
 else{
	 header ("location:login.php");
	 }
?>
 
</div>



<h1 align="center" style="color:#069">AGENDA DE LA SEMANA</h1>


<div id="tabla" align="center">

<table width="200" border="2">
<thead>
<tr>
<th colspan="10">LISTADO DE CITAS DISPONIBLES</th>
  </tr>
</thead>

<tbody align="center">

<td id="td"><h3>FECHA</h3></td>
<td id="td"><h3>MEDICO</h3></td>
<td id="td"><h3>ESPECIALIDAD</h3></td>
<td id="td"><h3>HORA</h3></td>
<td id="td"><h3>CONSULTORIO</h3></td>

<?php
$query = "SELECT * FROM agenda";
$result = mysql_query($query,$con);
while($row = mysql_fetch_array($result)){
	?>
	<tr>

<td><?php echo $row['Fecha']; ?></td>
<td><?php echo $row['Medico']; ?></td>
<td><?php echo $row['Especialidad']; ?></td>
<td><?php echo $row['Hora']; ?></td>
<td><?php echo $row['Consultorio']; ?></td>
 </tr>
 
 <?php
}	
?>



</tbody>

</table>

</div>


<?php
include("footer.php");
?>


</body>
</html>
