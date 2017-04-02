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
<title>Bienvenidos</title>
<link href="responsive/intropage/boilerplate.css" rel="stylesheet" type="text/css">
<link href="responsive/intropage/intro_estilos.css" rel="stylesheet" type="text/css">
<link href="responsive/intropage/index_gal/engine1/style.css" rel="stylesheet" type="text/css">
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
<script src="responsive/intropage/respond.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="responsive/intropage/index_gal/engine1/jquery.js"></script>
<link rel="icon" type="image/gif" href="imagenes/animated_favicon1.gif"/>
</head>
<body>

<?php
include("header login.php");
include("conexion.php");
?>

<div class="gridContainer clearfix">

<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
}

 else {
$usuario = $_SESSION['session_username']; 
$consulta = "SELECT nombre,apellido FROM usuarios WHERE documento = '$usuario'";
$resultado = mysql_query($consulta,$con);
$row= mysql_fetch_array($resultado);
?>

<strong><p id="user"> <?php echo $row['nombre']; ?>   <?php echo $row['apellido']; ?>  </p></strong>

<h2 align="center" style="margin-top:7%">CENTRO DE SALUD RAFAEL REYES</h2>


<div id="cultura">
<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
    
	<div class="ws_images" ><ul>
<li><img src="index/index_gal/imagenes banner/imagen1.jpg" alt="1_" title="C. de salud Rafael Reyes" id="wows1_0"/></li>
<li><img src="index/index_gal/imagenes banner/imagen2.jpg" alt="2_" title="C. de salud Rafael Reyes" id="wows1_1"/></li>
<li><img src="index/index_gal/imagenes banner/imagen3.jpg" alt="3_" title="C. de salud Rafael Reyes" id="wows1_2"/></li>
<li><img src="index/index_gal/imagenes banner/imagen4.jpg" alt="4_" title="C. de salud Rafael Reyes" id="wows1_3"/></li>
</ul></div>

<div class="ws_bullets"><div>
<a href="#" title="A"><img src="index/data1/tooltips/1.png" alt="1_"/>1</a>
<a href="#" title="B"><img src="index/data1/tooltips/2.png" alt="2_"/>2</a>
<a href="#" title="C"><img src="index/data1/tooltips/3.png" alt="3_"/>3</a>
<a href="#" title="D"><img src="index/data1/tooltips/4.png" alt="4_"/>4</a>
</div></div>

	<div id="wowslider-container1"><div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="index/index_gal/engine1/wowslider.js"></script>
	<script type="text/javascript" src="index/index_gal/engine1/script.js"></script>
	
    </div>
    

<div id="LayoutDiv2">
<h3 align="center" style="margin-bottom:3%">BIENVENIDOS A ESTE SITIO WEB, EN DONDE PODRAS REALIZAR LA SOLICITUD DE LAS CITAS MÉDICAS PARA LOS USUARIOS DEL CENTRO DE SALUD.</h3>
<p>Aquí podras solicitar tus citas médicas, actualizar tu información personal y cambiar tu conraseña. Para ellos deberas de registrarte en el sitio web y posteriormente ingresar al sistema con tu Número de documento y contraseña.</p> 
</div>

<div id="LayoutDiv3">

<div id="LayoutDiv4">
<div id="img1" align="center"><a href="asignacion_cita.php"><img src="responsive/intropage/index_gal/data1/toolstip/agenda.png"></a></div>
<div id="txt1"><p><strong style="color:#069">ASIGNACIÓN DE CITA:</strong> Allí podras solicitar tus citas médicas con la especialidad que quieras en la fecha y hora disponibles. Tambien podras descargar el comprobante de tu cita médica.</p></div>
</div>

<div id="LayoutDiv5">
<div id="img2" align="center"><a href="modificar.php"><img src="responsive/intropage/index_gal/data1/toolstip/actualizar.png"></a></div>
<div id="txt2"><p><strong style="color:#069">ACTUALICIÓN DE INFORMACIÓN:</strong> Aquí podras actualizar tus datos personales basicos, ten en cuenta que no podras modificarlos todos. No se podran dejar vacios campos que ya se encontraban llenos.</p></div>
</div>

<div id="LayoutDiv6">
<div id="img3" align="center"><a href="cambiar_contrasena.php"><img src="responsive/intropage/index_gal/data1/toolstip/contrasena.png"></a></div>
<div id="txt3"><p><strong style="color:#069">CAMBIO DE CONTRASEÑA:</strong> Por este medio podras hacer el cambio de contraseña cuando lo creas necesario o cuando la hayas recuperado luego de haberla olvidado y el Sitio Web te haya generado una aleatoria.</p></div>
</div>

</div></div>

<?php
}
?>

</div>

<?php
include("footer.php");
?>

</body>

</html>
