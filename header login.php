<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Centro de Salud Rafael Reyes</title>
 <link href="responsive/menu/estilos.css" rel="stylesheet" type="text/css">
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
<header>
    <a href="intropage.php" id="logo">Logo</a>
    <nav id="menu">
        <a href="#" class="nav-mobile" id="nav-mobile"></a>
        <ul>
            <li><a href="intropage.php"><strong>Inicio</strong></a></li>
            <li><a href="asignacion_cita.php"><strong>Asignar Cita</strong></a></li>
            <li><a href="modificar.php"><strong>Actualizar Informacion</strong></a></li>
            <li><a href="cambiar_contrasena.php"><strong>Cambiar Contraseña</strong></a></li>
            <li><a href="logout.php"><strong>Cerrar Sesion</strong></a></li>
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