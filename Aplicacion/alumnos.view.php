<!DOCTYPE html>
<?php
require 'functions.php';
//Define queienes tienen permiso en este archivo
$permisos = ['Administrador','Profesor'];
permisos($permisos);
//consulta las secciones
$secciones = $conn->prepare("select * from secciones");
$secciones->execute();
$secciones = $secciones->fetchAll();

//consulta de grados
$grados = $conn->prepare("select * from grados");
$grados->execute();
$grados = $grados->fetchAll();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUI - Modulo Docente</title>
    <link rel="stylesheet" href="css\otro_estilo.css">
    <script src="https://kit.fontawesome.com/118daf1386.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <header class="header">
		<div class="container">
		    <div class="btn-menu">
                <label for="btn-menu"><i class="fa-solid fa-bars"></i></label>
		    </div>
			    <div class="name">
				    <h1>C.U.I</h1>
			    </div>
			    <nav class="menu">
                    <h5>Docente</h5>
				    <a href="logout.php">Cerrar Sesión </a>
			    </nav>
		</div>
	</header>

    <input type="checkbox" id="btn-menu">
        <div class="container-menu">
	        <div class="cont-menu">
		        <nav>
                    <br>
                    <br>
			        <a class="m" href="registro_notas.php">Registro de Notas</a>
                    <a class="m" href="consulta_notas.php">Consulta de Notas</a>
                    <a class="m" href="alumnos.view.php">Registro de Alumnos</a>
                    <a class="m" href="listadoalumnos.view.php">Listado de Alumnos</a>
		        </nav>
		        <label for="btn-menu"><i class="fa-solid fa-xmark"></i></label>
	        </div>
        </div>

<div class="body">
    <div class="panel">
            <h4>Registro de Alumnos</h4>
            <form method="post" class="form" action="procesaralumno.php">
                <label>Nombres</label><br>
                <input type="text" required name="nombres" maxlength="45">
                <br>
                <label>Apellidos</label><br>
                <input type="text" required name="apellidos" maxlength="45">
                <br><br>
                <label>Nro de Lista</label><br>
                <input type="number" min="1" class="number" name="numlista">
                <br><br>
                <label>Sexo</label><br><input required type="radio" name="genero" value="M"> Masculino
                <input type="radio" name="genero" required value="F"> Femenino
                <br><br>
                <label>Cuatrimestre</label><br>
                <select name="grado" required>
                    <?php foreach ($grados as $grado):?>
                        <option value="<?php echo $grado['id'] ?>"><?php echo $grado['nombre'] ?></option>
                    <?php endforeach;?>
                </select>
                <br><br>
                <label>Sección</label><br>

                    <?php foreach ($secciones as $seccion):?>
                        <input type="radio" name="seccion" required value="<?php echo $seccion['id'] ?>">Sección <?php echo $seccion['nombre'] ?>
                    <?php endforeach;?>

                <br><br>
                <button type="submit" name="insertar">Guardar</button> <button type="reset">Limpiar</button> <a class="btn-link" href="listadoalumnos.view.php">Ver Listado</a>
                <br><br>
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al almacenar el registro</span>';
                if(isset($_GET['info']))
                    echo '<span class="success">Registro almacenado correctamente!</span>';
                ?>

            </form>
        <?php
        if(isset($_GET['err']))
            echo '<span class="error">Error al guardar</span>';
        ?>
        </div>
</div>

<footer>
    <p>Derechos reservados &copy; 2020</p>
</footer>

</body>

</html>