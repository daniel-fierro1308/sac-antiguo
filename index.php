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
<link href="index/boilerplate.css" rel="stylesheet" type="text/css">
<link href="index/index_estilos.css" rel="stylesheet" type="text/css">
<link href="index/index_gal/engine1/style.css" rel="stylesheet" type="text/css">
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
<script src="index/respond.min.js"></script>
<script src="index/main.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="index/index_gal/engine1/jquery.js"></script>
<link rel="icon" type="image/gif" href="imagenes/animated_favicon1.gif"/>
</head>
<body>

<?php
include("header.php");
?>

<div class="gridContainer clearfix">

<button class="button">
<strong><a href="index/Manual de Usuario/Manual de Usuario.pdf" download="Manual de Usuario">Manual de Usuario</a></strong>
</button>

<h2 align="center" style="margin-top:3%" id="titulo">CENTRO DE SALUD RAFAEL REYES</h2>

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
<h3 align="center" style="margin-bottom:3%;">BIENVENIDOS A ESTE SITIO WEB, EN DONDE PODRAS REALIZAR LA SOLICITUD DE LAS CITAS MÉDICAS PARA LOS USUARIOS DEL CENTRO DE SALUD.</h3>
<p>Aquí podras solicitar tus citas médicas, actualizar tu información personal y cambiar tu conraseña. Para ellos deberas de registrarte en el sitio web y posteriormente ingresar al sistema con tu Número de documento y contraseña.</p> 
</div>

<div id="LayoutDiv3">

<div id="LayoutDiv4">
<div id="img2" align="center"><a href="registro.php"><img src="index/index_gal/data1/toolstip/registro.png"></a></div>
<div id="txt2"><p><strong style="color:#069">REGISTRO:</strong> Para poder ingresar debes de estar registrado en el Sitio Web, por eso deberas diligenciar el formulario que aparece allí con la respectiva información que se solicita.</p></div>
</div>

<div id="LayoutDiv5">
<div id="img1" align="center"><a href="login.php"><img src="index/index_gal/data1/toolstip/login.png"></a></div>
<div id="txt1"><p><strong style="color:#069">LOG IN:</strong> Allí podras ingresar y solicitar tus citas médicas, actualizar tu información personal y cambiar tu conraseña. Para ello deberas haberte registrado anteriormente en el Sitio Web.</p></div>
</div>

<div id="LayoutDiv6">
<div id="img3" align="center"><a href="formulario contacto.php"><img src="index/index_gal/data1/toolstip/contacto.png"></a></div>
<div id="txt3"><p><strong style="color:#069">CONTACTO:</strong> Por este medio podras hacernos saber tus dudas, quejas o reclamos y recomendaciones que tengas para nosotros. Tambien podras encontrar un mapa con nuestra ubicación por si deseas acercarte.</p></div>
</div>

</div></div>
     
</div>

<?php
include("footer.php");
?>

</body>
</html>