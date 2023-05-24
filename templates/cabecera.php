<?php 
session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
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
     <nav class="navbar navbar-expand navbar-light bg-light">
         <div class="nav navbar-nav">
             <a class="nav-item nav-link active" href="#">Inicio <span class="visually-hidden">(current)</span></a>
             <a class="nav-item nav-link" href="vista_horarios.php">Horarios</a>
             <a class="nav-item nav-link" href="vista_alimentos.php">Alimentos</a>
             <a class="nav-item nav-link" href="cerrar.php">Cerrar sesión</a>
         </div>
     </nav>