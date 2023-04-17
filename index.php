<?php 
session_start(); 
if($_POST){

  $mensaje = 'Usuario o contraseña incorrectos';
  
  if($_POST['usuario'] == 'admin' && $_POST['contrasenia'] == 'admin'){
    $_SESSION['usuario']=$_POST['usuario'];
   header('Location: secciones/index.php');
  }
}

?>
<!doctype html>
<html lang="es">
  <head>
    <title>Comedor UACM Cuautepec</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
<form action="" method="post">
                    <div class="card-header">   Inicio se sesión    </div>
                <div class="card-body">
                <?php if(isset($mensaje)) {?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php } ?>
                <div class="mb-3">
                  <label for="usuario" class="form-label">Usuario</label>
                  <input type="text"
                    class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario">
                </div>
                <div class="mb-3">
                  <label for="contrasenia" class="form-label">Contraseña</label>
                  <input type="password"
                    class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Entrar a la aplciación</button>
                </form>
                </div>

            </div>
            </div>
        </div>
    </div>

  


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>