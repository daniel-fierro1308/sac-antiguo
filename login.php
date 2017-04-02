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
<title>Iniciar Sesi&oacute;n</title>
<link href="responsive/login/boilerplate.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="responsive/login/estilo_login2.css" />
<!-- 
Para obtener m�s informaci�n sobre los comentarios condicionales situados alrededor de las etiquetas html en la parte superior del archivo:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/
  
Haga lo siguiente si usa su compilaci�n personalizada de modernizr (http://www.modernizr.com/):
* inserte el v�nculo del c�digo js aqu�
* elimine el v�nculo situado debajo para html5shiv
* a�ada la clase "no-js" a las etiquetas html en la parte superior
* tambi�n puede eliminar el v�nculo con respond.min.js si ha incluido MQ Polyfill en su compilaci�n de modernizr 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="responsive/login/respond.min.js"></script>
<script src="responsive/login/efecto.js"></script>
<link rel="icon" type="image/gif" href="imagenes/animated_favicon1.gif"/>
</head>
<body>

<?php include("header.php"); ?>

<div class="gridContainer clearfix">

<?php
session_start();
?>

<?php include("conexion.php"); ?>

<?php

if(isset($_POST["login"])){
	
	if(!empty($_POST['documento']) or !empty($_POST['password'])){ /*A*/
		
    $documento=$_POST['documento'];
    $password=$_POST['password'];

    $query =mysql_query("SELECT * FROM usuarios WHERE documento='".$documento."' AND password='".$password."'");

    $numrows=mysql_num_rows($query); /*B*/
    
	if($numrows!=0){ /*C*/
		
    while($row=mysql_fetch_assoc($query)){ /*D*/
    $dbdocumento=$row['documento'];
    $dbpassword=$row['password'];
    }

    if($documento == $dbdocumento && $password == $dbpassword) {/*E*/

    $_SESSION['session_username']=$documento;

    
    header("Location: intropage.php"); /*F*/
    }
	
    }
	
	 else {

 $message =  "Nombre de usuario o contrase&ntilde;a invalida!"; /*G*/
    }

} 
else{
	$message = "Por favor ingrese su documento y contrase&ntilde;a para iniciar sesion"; /*H*/
	}
}

?>

<?php if (!empty($message)) {echo "<p class=\"defecto\">" . " ". $message . "</p>";} ?>

<section align="center"> 
<a href="#" onclick="mostrarm()" style="text-decoration:none" title="Clic Aqui!"><h3 align="center" style="margin-top:10%; color:#069">INICIO SESI&Oacute;N DE USUARIO</h3></a>
<br>
<div id='oculto' style='display:none; margin-top:4%'>
Si usted no cuenta con un usuario registrado, lo invitamos a que se registre ingresando al siguiente enlace <a href="registro.php">REGISTRARSE</a>.
<br><br>
Diligencie el formulario que aparece all&iacute; y asi posteriormente ingresar a la p&aacute;gina.
<br><br>
Registrese en la pagina ingresando al enlace anterior o dirigiendose a la secci&oacute;n REGISTRAR del men&uacute; en la parte superior de la p&aacute;gina.
<br><br>
</div>
<br>
 </section>

    <div class="container mlogin">
    
            <div id="login">
            <h1><img src="imagenes/logo1.png" style="margin-right:5%">Iniciar Sesi&oacute;n</h1>
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label>Numero de Documento<br /> </label>
        <input type="text"  name="documento" id="documento" class="input" value="" size="15" /></label>
    </p>
    <p>
        <label>Contrase&ntilde;a<br /> </label>
        <input type="password"  name="password" id="password" class="input" value="" size="15" /></label>
        
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Entrar"/>
    </p>
    
    <p class="olvido"> <a href="recuperar_contrasena.php" >&iquest;Olvid&oacute; su contrase&ntilde;a?</a>...</p>
    
        <p class="regtext">No estas registrado? <a href="registro.php" >Registrate Aqu&iacute;</a>!</p>
</form>

    </div>

    </div>
  
</div>



 <?php

	include("footer.php");
	?>

</body>
</html> 
