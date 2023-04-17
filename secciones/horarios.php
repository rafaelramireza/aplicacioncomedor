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
            
            $sql="SELECT * FROM horarios WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            $horario=$consulta->fetch(PDO::FETCH_ASSOC);

            $nombre=$horario['nombre'];
            $atencion=$horario['atencion'];

            $sql="SELECT alimentos.id FROM horarios_alimentos
            INNER JOIN alimentos ON alimentos.id=horarios_alimentos.idalimento
            WHERE horarios_alimentos.idhorario=:idhorario";

            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':idhorario',$id);
            $consulta->execute();
            $alimentosHorario=$consulta->fetchAll(PDO::FETCH_ASSOC);
            
            print_r($alimentosHorario);

            foreach($alimentosHorario as $alimento){
                $arregloAlimentos[]=$alimento['id'];
            }
            
        break;

        case 'borrar':
            $sql="DELETE FROM horarios WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
        break;

        case "editar":
            $sql="UPDATE horarios SET nombre=:nombre, atencion=:atencion WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre',$nombre);
            $consulta->bindParam(':atencion',$atencion);
            $consulta->bindParam(':id',$id);
            $consulta->execute();

            if(isset($alimentos)){

                $sql="DELETE FROM horarios_alimentos WHERE idhorario=:idhorario"; 
                $consulta=$conexionBD->prepare($sql);
                $consulta->bindParam(':idhorario',$id);
                $consulta->execute();
                
                foreach($alimentos as $alimento){
                
                $sql="INSERT INTO horarios_alimentos (id, idhorario, idalimento)
                VALUES (NULL,:idhorario, :idalimento)";
                $consulta=$conexionBD->prepare($sql);
                $consulta->bindParam(':idhorario',$id);
                $consulta->bindParam(':idalimento', $alimento);
                $consulta->execute();
                }
                $arregloAlimentos=$alimentos;
                }
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