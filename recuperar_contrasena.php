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
<title>Recuperar Contraseña</title>
<link href="responsive/recuperar/boilerplate.css" rel="stylesheet" type="text/css">
<link href="responsive/recuperar/recuperar_estilos.css" rel="stylesheet" type="text/css">
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
<script src="responsive/recuperar/respond.min.js"></script>
<script src="responsive/recuperar/efecto.js"></script>
<link rel="icon" type="image/gif" href="imagenes/animated_favicon1.gif"/>
</head>
<body>
<?php
include('header.php'); // se incluye el menu 
include('conexion.php'); // incluimos la conexion a la base de datos
?>

<div class="gridContainer clearfix">

    <?php
	
        if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos del formulario
            if(empty($_POST['documento'])) {
				
                $message = "No ha ingresado el usuario, por favor llene los campos";
            }
			
			
			
			else {
                $usuario_documento = mysql_real_escape_string($_POST['documento']);
				
                $usuario_documento = trim($usuario_documento);
				
                $sql = mysql_query("SELECT documento, password, email FROM usuarios WHERE documento ='".$usuario_documento."'");
				
                if(mysql_num_rows($sql)) {
                    $row = mysql_fetch_assoc($sql);
                    $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña
                    $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria
                    $usuario_documento = $row['documento'];
                    $usuario_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario
                    $usuario_clave2 = ($usuario_clave); // encriptamos la nueva contraseña para guardarla en la BD
                    $usuario_email = $row['email'];
                    // actualizamos los datos (contraseña) del usuario que solicitó su contraseña
					
                    mysql_query("UPDATE usuarios SET password='".$usuario_clave2."' WHERE documento='".$usuario_documento."'");
					
                    // Enviamos por email la nueva contraseña
                    $remite_nombre = "Centro de salud Rafael Reyes"; // Tu nombre o el de tu página
                    $remite_email = "danielfierro120@gmail.com"; // tu correo
                    $asunto = "Recuperación de contraseña"; // Asunto (se puede cambiar)
					
                    $mensaje = "Se ha generado una nueva contraseña para el usuario con numero de documento <strong>".$usuario_documento."</strong>. La nueva contraseña es: <strong>".$usuario_clave."</strong>.";
					
                    $cabeceras = "From: ".$remite_nombre." <".$remite_email.">\r\n";
                    $cabeceras = $cabeceras."Mime-Version: 1.0\n";
                    $cabeceras = $cabeceras."Content-Type: text/html";
                    @mail($usuario_email,$asunto,$mensaje,$cabeceras);
					
                    if(@mail) {
                        $message = "La nueva contraseña ha sido enviada al email asociado al usuario con numero de documento ".$usuario_documento.", por favor revise su correo.";
                    }
					
					else {
                        $message = "No se ha podido enviar el email, por favor intente de nuevo.";
                    }
					
                }
				
				else {
                $message = "El numero de documento <strong>".$usuario_documento."</strong> no está registrado, por favor intente de nuevo.";
                }
            }
        }
		
    ?>

<?php if (!empty($message)) {echo "<p class=\"defecto\">" . $message . "</p>";} 
?>
    
<section align="center"> 
<a href="#" onclick="mostrarm()" style="text-decoration:none" title="Clic Aqui!"><h3 align="center" style="margin-top:10%; color:#069">RECUPERACIÓN DE CONTRASEÑA</h3></a>
<br>
<div id='oculto' style='display:none; margin-top:4%'>
En esta sección usted podra recuperar su contraseña en caso de que la haya olvidado y no la recuerde.
<br><br>
Debe ingresar su número de documento o con el que se registro en la página.
<br><br>
Diligencie este formulario y se le enviara una contraseña al correo electronico asociado con ese número de documento al momento del Registro.
<br><br>
</div>
<br>
 </section>    
         
<div class="container mrecuperar">
<div id="recuperar">   
<form action="" method="post">
         <h1>Recuperar Contraseña</h1>
            <label>Por favor ingrese su numero de documento:</label><br />
            <input type="text" name="documento" /><br />
            <input type="submit" name="enviar" class="boton1" value="Enviar" />
            <input type="button" name="cancelar" class="boton2" value="Cancelar" onClick="self.location.href = 'login.php'" onKeyPress="self.location.href = 'login.php'"/>                       
                 </form>
        </div>
        </div>


</div>

<?php
include('footer.php');
?>
</body>
</html>
