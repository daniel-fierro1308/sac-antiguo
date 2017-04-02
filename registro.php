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
<title>Registrarse</title>
<link href="responsive/registro/boilerplate.css" rel="stylesheet" type="text/css">
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
<script src="responsive/registro/respond.min.js"></script>
<script src="responsive/registro/efecto.js"></script>
<link rel="icon" type="image/gif" href="imagenes/animated_favicon1.gif"/>
</head>
<body>

<?php 
session_start(); 
include "conexion.php";
include"header.php";            
?>

<div class="gridContainer clearfix">

<?php 
if(isset($_POST['enviar'])) 
{ 
    if(!empty($_POST['nombre']) or !empty( $_POST['apellido']) or !empty($_POST['tipo_documento']) or !empty($_POST['documento']) or !empty($_POST['telefono']) or !empty($_POST['email']) or !empty($_POST['password']) or !empty($_POST['repassword'])) // A
    { 
    
        $sql = 'SELECT * FROM usuarios'; 
        $rec = mysql_query($sql); 
        $verificar_documento = 0; 
		$verificar_email = 0;
  
        while($result = mysql_fetch_object($rec))  // B
        { 
            if($result->documento == $_POST['documento'])   // C
            { 
                $verificar_documento = 1; 
            } 
			if($result-> email == $_POST['email']){   // D
				$verificar_email = 1;
				}
        }  
  
        if($verificar_documento == 0 && $verificar_email == 0)  // E
		 
        { 
		
		 $password = $_POST['password'];
		 $validar_pass = strlen($password);
   
			  
            if($validar_pass >= 8 && $_POST['password'] == $_POST['repassword']) // F
            { 
		        
                $nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$tipo_documento = $_POST['tipo_documento'];
				$documento = $_POST['documento'];
				$telefono = $_POST['telefono'];
				$email = $_POST['email'];			 
                
                $sql = "INSERT INTO usuarios (nombre,apellido,tipo_documento,documento,telefono,email,password) VALUES ('$nombre','$apellido','$tipo_documento','$documento','$telefono','$email','$password')";
                mysql_query($sql); 
  
                $message = 'Usted se ha registrado correctamente.'; 
            } 
			
            else  // G
            { 
               $message = 'Señor Usuario por favor revise la contrase&ntilde;a debe tener por lo menos 8 caracteres y deben ser iguales Gracias.'; 
            }
			
			 
       
	 } // H
		else // I
        { 
            $message = 'Este numero de documento o email ya ha sido registrado anteriormente.'; 
        }
		
		 
	} 
	
	else{ // J
		$message = "Por Favor Llene todos los campos Gracias";
		}
	
} // este cierra el primer if 


 
?> 

<?php if (!empty($message)) {echo "<p class=\"defecto\">" . $message . "</p>";} 
?>

<section align="center"> 
<a href="#" onclick="mostrarm()" style="text-decoration:none" title="Clic Aqui!"><h3 align="center" style="margin-top:10%; color:#069">REGISTRO DE USUARIOS</h3></a>
<br>
<div id='oculto' style='display:none; margin-top:4%'>
Si usted no cuenta con un usuario registrado, lo invitamos a que se registre ingresando su información personal en el siguiente formulario.
<br><br>
Diligencie el formulario y asi posteriormente ingresar a la p&aacute;gina.
<br><br>
Registrandose en la pagina podra ingresar a ella y posteriormente podra solicitar su cita médica y llevar a cabo las distintas funciones que se encuentrab allí.
<br><br>
</div>
<br>
 </section>

<link href="responsive/registro/registro_login.css" rel="stylesheet" type="text/css" />

<form action="" method="post" class="registro">
<fieldset>
<h1><img src="imagenes/logo1.png" style="margin-right:5%">Registrese</h1>
 
<div><label>Nombre:</label>
<input type="text"  name="nombre" placeholder="Ingresa tu nombre"></div>

<div><label>Apellido:</label>
<input type="text"  name="apellido" placeholder="Ingresa tus apellidos"></div>
 
<div><label>Tipo Doc:</label>
<select name="tipo_documento">
<option value="">Tipo de Documento</option>
<option value="Tarjeta de Identidad">Tarjeta de identidad</option>
<option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
</select></div>

<div><label>Documento:</label> 
<input type="number"  name="documento" placeholder="Número Documento"></div> 

<div><label>Telefono:</label> 
<input type="number"  name="telefono" placeholder="Número Telefonico"></div>

<div><label>E-mail:</label>
<input type="email"  name="email" placeholder="Correo Electronico" /></div> 

<div><label>Contrase&ntilde;a:</label> 
<input type="password"  name="password" placeholder="Contraseña"></div> 

<div><label>Confirmar:</label> 
<input type="password"  name="repassword" placeholder="Confirmar Contraseña"></div> 

<div> 
<input type="submit" name="enviar" value="Registrarme"></div> 

<p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aqu&iacute;!</a>!</p>
</fieldset>
</form> 

</div>

<?php
include("footer.php");
?>

</body>
</html>