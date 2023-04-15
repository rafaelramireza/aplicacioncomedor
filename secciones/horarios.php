<?php
include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

$id=isset($_POST['id'])?$_POST['id']:'';
$nombre=isset($_POST['nombre'])?$_POST['nombre']:'';
$atencion=isset($_POST['atencion'])?$_POST['atencion']:'';

$alimetos=isset($_POST['alimentos'])?$_POST['alimentos']:'';
$accion=(isset($_POST['accion']))?$_POST['accion']:'';

if($accion!=""){
    switch($accion){
        case 'agregar':
            $sql="INSERT INTO horarios (id, nombre, atencion) VALUES (NULL,:nombre, :atencion)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre',$nombre);
            $consulta->bindParam(':atencion',$atencion);
            $consulta->execute();
            $idHorario=$conexionBD->lastInsertId();
            
            foreach($alimetos as $alimento){
                $sql="INSERT INTO horarios_alimentos (id, idhorario, idalimento) VALUES (NULL, :idhorario, :idalimento)";
                $consulta=$conexionBD->prepare($sql);
                $consulta->bindParam(':idhorario',$idHorario);
                $consulta->bindParam(':idalimento',$alimento);
                $consulta->execute();
            }

        break;

        case 'Seleccionar':
            echo "Presionaste Seleccionar";
            echo $id;
        break;
    }
}


$sql = "SELECT * FROM horarios";
$listaHorarios=$conexionBD->query($sql);
$horarios=$listaHorarios->fetchAll();

foreach($horarios as $clave => $horario){
    $sql="SELECT * FROM alimentos
    WHERE id IN (SELECT idalimento FROM horarios_alimentos WHERE idhorario=:idhorario)";
    
    $consulta=$conexionBD->prepare($sql);
    $consulta->bindParam(':idhorario',$horario['id']);
    $consulta->execute();
    $alimentosHorario=$consulta->fetchAll();
    $horarios[$clave]['alimentos']=$alimentosHorario;
}   

$sql="SELECT * FROM alimentos";
$listaAlimentos=$conexionBD->query($sql);
$alimentos=$listaAlimentos->fetchAll();

?>