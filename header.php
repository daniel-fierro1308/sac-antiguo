<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
	   <meta charset="utf-8">
       <title>Centro de salud Rafael Reyes</title>
     
      <link href="responsive/menu/estilos.css" rel="stylesheet" type="text/css">
	  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	
</head> 

	<body>

<header>
    <a href="index.php" id="logo">Logo</a>
    <nav id="menu">
        <a href="#" class="nav-mobile" id="nav-mobile"></a>
        <ul>
            <li><a href="index.php"><strong>Inicio</strong></a></li>
            <li><a href="quienes somos.php"><strong>¿Quienes Somos?</strong></a></li>
            <li><a href="login.php"><strong>Iniciar Sesion</strong></a></li>
            <li><a href="registro.php"><strong>Registrar</strong></a></li>
            <li><a href="contacto.php"><strong>Contacto</strong></a></li>
        </ul>
    </nav>
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(function() {

        var btn_movil = $('#nav-mobile'),
            menu = $('#menu').find('ul');

        // Al dar click agregar/quitar clases que permiten el despliegue del menú
        btn_movil.on('click', function (e) {
            e.preventDefault();

            var el = $(this);

            el.toggleClass('nav-active');
            menu.toggleClass('open-menu');
        })

    });
</script>
    
    </body>
    </html>
  
	