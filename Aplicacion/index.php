<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Usuario - CUI</title>
    <link rel="stylesheet" href="css\estilos.css">
    <script src="https://kit.fontawesome.com/118daf1386.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="cubo">
        <div class="identify">
            <h1>
             C.U.I 
            </h1>
            <p>Colegio <br>Universitario <br>de Informática</p>
        </div>

    <div class="for">
            <form action="login_post.php" class="form" method="post">
        
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" class="form_input" placeholder="Usuario" maxlength="10">
                <br>
                <i class="fa-solid fa-unlock-keyhole"></i>
                <input type="password" name="password" class="form_input" placeholder="Contraseña" maxlength="8">
                <br>
               
                <button type="submit" class="button">Iniciar Sessión</button>
                <br>
                <a href="#" class="forget">¿Olvido su contraseña?</a>
            </form>
           
        </div>
    </div>
</body>
</html>