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
<title>Modificar Información</title>
<link href="responsive/modificar/boilerplate.css" rel="stylesheet" type="text/css">
<link href="responsive/modificar/modificar.css" rel="stylesheet" type="text/css">
<!-- 
Para obtener más información sobre los comentarios condicionales situados alrededor de las etiquetas html en la parte superior del archivo:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/
  
Haga lo siguiente si usa su compilación personalizada de modernizr (http://www.modernizr.com/):
* inserte el vínculo del código js aquí
* elimine el vínculo situado debajo para html5shiv
* añada la clase "no-js" a las etiquetas html en la parte superior
* también puede eliminar el vínculo con respond.min.js si ha incluido MQ Polyfill en su compilación de modernizr 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="responsive/modificar/respond.min.js"></script>
<script src="responsive/modificar/efecto.js"></script>
<link rel="icon" type="image/gif" href="imagenes/animated_favicon1.gif"/>
</head>
<body>

<?php
include("header login.php");
?>

<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
  <center>
    <?php
	include("conexion.php");
	
	session_start();
	
	if(isset($_SESSION['session_username'])) {
		
		
  $usuario_documento = $_SESSION['session_username']; 



  
$query= "SELECT * FROM usuarios WHERE documento= '$usuario_documento'";
$registro=mysql_query($query,$con);
$datos = mysql_fetch_array($registro);

?>


<?php
if(isset($_POST['guardar'])){
	
$telefono=$_POST['telefono'];
$email=$_POST['email'];

$sql = "UPDATE usuarios set telefono = '$telefono', email = '$email'  WHERE documento= '$usuario_documento'";
$registro = mysql_query($sql,$con);

if($registro){
  $message = "Los datos han sido actualizados correctamente, <strong>vuelva a cargar la p&aacute;gina.</strong>";	
	}
else{
	$message = "Los datos no han sido actualizados, intente nuevamente.";	
	}	

	
	}

?>

<?php if (!empty($message)) {echo "<p class=\"defecto\">" . " ". $message . "</p>";} ?>

<section> 
<a href="#" onclick="mostrarm()" style="text-decoration:none" title="Clic Aqui!"><h3 align="center" style="margin-top:10%; color:#069">ACTUALIZACIÓN DE DATOS</h3></a>
<br>
<div id='oculto' style='display:none; margin-top:4%'>
Si usted desea actualizar sus datos personales en la página, aqui encontrara un formulario con sus datos en donde podra modificarlos y posteriormente guardarlos.
<br><br>
<strong>NOTA:</strong> Recuerde que todos sus datos no pueden ser modificados, solo sus datos secundarios podran ser editados (Correo Electronico, Telefonos, etc).
<br><br>
Cuando haya actualizado sus datos correctamente, vuelva a cargar la página.
<br><br>
</div>
<br>
 </section>

  <form  method="post" class="modificar">
  
  <h1> <img src="imagenes/logo1.png" style="margin-right:5%">Mi Información</h1>
  
  <div> <label>Nombre:</label>
  <input type="text" disabled="true" name="nombre" placeholder="nombre" value="<?php echo $datos['nombre']; ?>"/> </div>
   
  <div> <label>Apellidos:</label>
  <input type="text" disabled="true" name="apellido" placeholder="apellido" value="<?php echo $datos['apellido']; ?>"/> </div>
  
 <div> <label>T. Documento:</label>
  <input type="text" disabled="true"  name="tipo_documento" placeholder="tipo_documento" value="<?php echo $datos['tipo_documento']; ?>"/> </div>
  
 <div> <label>N. Documento:</label>
  <input type="number" disabled="true"  name="documento" placeholder="documento" value="<?php echo $datos['documento']; ?>"/> </div> 
  
 <div> <label>E-mail:</label>
  <input type="email"  name="email" placeholder="correo" value="<?php echo $datos['email']; ?>" required/> </div>
  
 <div> <label>Telefono</label>
  <input type="number"  name="telefono" placeholder="telefono" value="<?php echo $datos['telefono']; ?>" required/> </div>
  
  <div> 
<input type="submit" name="guardar" value="Guardar"></div>
  
  </form>
  
  
  
  <?php
	}
	
	
	else{
		header("location:login.php");
		}
	?>
   
  </center>
  
   </div>
</div>

<?php 
include("footer.php");
?>

  
</div>
</body>
</html>
