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
<title>Cambiar Contrase&ntilde;a</title>
<link href="responsive/cambiar_contrasena/boilerplate.css" rel="stylesheet" type="text/css">
<link href="responsive/cambiar_contrasena/cambiar_estilos.css" rel="stylesheet" type="text/css">
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
<script src="responsive/cambiar_contrasena/respond.min.js"></script>
<script src="responsive/cambiar_contrasena/efecto.js"></script>
<link rel="icon" type="image/gif" href="imagenes/animated_favicon1.gif"/>
</head>
<body>

<?php
	include('header login.php');
?>

<?php
    session_start();
    include('conexion.php'); // se incluye la conexion con la base de datos
?>

    <?php
        if(isset($_SESSION['session_username'])) { // se comprueba que la sesi�n est� iniciada //A
		   
           
			
            if(isset($_POST['enviar'])) {  //B
			
					
				if(!empty($_POST['contrasena_actual']) or !empty($_POST['usuario_contrasena']) or !empty($_POST['usuario_confirmar']) ) { //C
				
              
				$usuario_documento = $_SESSION['session_username'];
				$contra_Actual = $_POST['contrasena_actual'];
				$nueva_contra = mysql_real_escape_string ($_POST['usuario_contrasena']);
				$confirmar_contra = $_POST['usuario_confirmar'];
				
				$query = mysql_query("SELECT password FROM usuarios WHERE documento ='".$usuario_documento."'");
				$row =mysql_fetch_array($query);
				$password = $row ["password"];
				
			 
                if($contra_Actual == $password && $nueva_contra == $confirmar_contra) { //D
					 $validar_pass = strlen($nueva_contra);

					 if($validar_pass>= 8){ //E
					
                  $sql = mysql_query("UPDATE usuarios SET password='".$nueva_contra."' WHERE documento='".$usuario_documento."'");
            $message = "Contrase&ntilde;a cambiada correctamente.";
                 	
					} //F
					
					else{ //G
						$message = "Error: La contraseña debe tener por lo menos 8 caracteres Por favor Vuelva a intentar";	
					}
					
					 
					 
					
				}
					
					else { //H
       $message = "Error: No se pudo cambiar la contrase&ntilde;a.";
                    }
							
            }
			else{ //I
				$message = "Por favor llene los datos completamente.";
				}
			} //J
		
    ?>
    
<?php if (!empty($message)) {echo "<p class=\"defecto\">" . $message . "</p>";} 
?>
   
<div class="gridContainer clearfix">

<section align="center"> 
<a href="#" onclick="mostrarm()" style="text-decoration:none" title="Clic Aqui!"><h3 align="center" style="margin-top:10%; color:#069">CAMBIO DE CONTRASEÑA</h3></a>
<br>
<div id='oculto' style='display:none; margin-top:4%'>
En esta sección usted podra hacer el cambio de su contraseña si asi lo quiere. Solo diligencie el respectivo formulario correctamente. 
<br><br>
Para realizar correctamente el cambio de su contraseña debe digitar su contraseña actual, su nueva contraseña y confirmar la nueva contraseña(si no coinciden no podra realizar el cambio).
<br><br>
Si la contraseña actual no coincide con la base de datos de la página no podra realizar el cambio de su contraseña.
<br><br>
</div>
<br>
 </section>
 
  <div class="container mcambiar">
  <div id="cambiar">
            <form action="" method="post" class="cambiar">
            
             <h1>Cambiar Contrase&ntilde;a</h1> 
               
       <label> Contrase&ntilde;a Actual:</label><br/>
 <input type="password" name="contrasena_actual"/>       
 
   <label>Nueva Contrase&ntilde;a:</label><br />
   <input type="password"   name="usuario_contrasena"/>
                
   <label>Confirmar Contrase&ntilde;a:</label><br />
   <input type="password"   name="usuario_confirmar"/>
                
<input type="submit" name="enviar" value="Enviar" class="enviar"  />
<input type="submit" name="cancelar" value="Cancelar" class="enviar" onclick="self.location.href = 'intropage.php'" 
onkeypress= "self.location.href = 'intropage.php'" />   
  
</form>
            </div>
            </div>           
            
    <?php
        }
		
		
		else { //K
         header("location:login.php");
        }
		
    ?> 
      
</div>

<?php
include("footer.php");
?>

</body>
</html>
