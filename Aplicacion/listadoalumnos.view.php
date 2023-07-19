<?php
require 'functions.php';

$permisos = ['Administrador','Profesor'];
permisos($permisos);
//consulta los alumnos para el listaddo de alumnos
$alumnos = $conn->prepare("select a.id, a.num_lista, a.nombres, a.apellidos, a.genero, b.nombre as grado, c.nombre as seccion from alumnos as a inner join grados as b on a.id_grado = b.id inner join secciones as c on a.id_seccion = c.id order by a.apellidos");
$alumnos->execute();
$alumnos = $alumnos->fetchAll();
?>
<!DOCTYPE html>
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
            <h4>Listado de Alumnos</h4>
            <table class="table" cellspacing="0" cellpadding="0">
                <tr>
                    <th>No de<br>lista</th><th>Apellidos</th><th>Nombres</th><th>Genero</th><th>Grado</th><th>Seccion</th>
                    <th>Editar</th><th>Eliminar</th>
                </tr>
                <?php foreach ($alumnos as $alumno) :?>
                <tr>
                    <td align="center"><?php echo $alumno['num_lista'] ?></td><td><?php echo $alumno['apellidos'] ?></td>
                    <td><?php echo $alumno['nombres'] ?></td><td align="center"><?php echo $alumno['genero'] ?></td>
                    <td align="center"><?php echo $alumno['grado'] ?></td><td align="center"><?php echo $alumno['seccion'] ?></td>
                    <td><a href="alumnoedit.view.php?id=<?php echo $alumno['id'] ?>">Editar</a> </td>
                    <td><a href="alumnodelete.php?id=<?php echo $alumno['id'] ?>">Eliminar</a> </td>
                </tr>
                <?php endforeach;?>
            </table>
                <br><br>

                <a class="btn-link" href="alumnos.view.php">Agregar Alumno</a>
                <br><br>
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al almacenar el registro</span>';
                if(isset($_GET['info']))
                    echo '<span class="success">Registro almacenado correctamente!</span>';
                ?>


        </div>
</div>

</body>

</html>