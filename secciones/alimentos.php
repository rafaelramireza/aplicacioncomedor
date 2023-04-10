<?php
include_once '../configuraciones/bd.php';//incluye la conexion a la base de datos
$conexionBD=BD::crearInstancia();//crea la instancia a la conexion a la base de datos

$id=isset($_POST['id']) ? $_POST['id'] : '';//obtiene el valor del id
$nombre_alimento=isset($_POST['nombre_alimento']) ? $_POST['nombre_alimento'] : '';//obtiene el valor del nombre del alimento
$accion=isset($_POST['accion']) ? $_POST['accion'] : '';//obtiene el valor de la accion

print_r($_POST);

if ($accion!='') {
    switch ($accion) {

        case 'agregar':
            $sql="INSERT INTO alimentos (id, nombre_alimento) VALUES (NULL, :nombre_alimento)";
            $consulta=$conexionBD->prepare($sql);//prepara la consulta
            $consulta->bindParam(':nombre_alimento', $nombre_alimento);//vincula el parametro
            $consulta->execute();//ejecuta la consulta
        break;

    case 'editar':
        $sql="UPDATE alimentos SET nombre_alimento=:nombre_alimento WHERE id=:id";//consulta para editar un alimento
        $consulta=$conexionBD->prepare($sql);//prepara la consulta
        $consulta->bindParam(':id', $id);//vincula el parametro
        $consulta->bindParam(':nombre_alimento', $nombre_alimento);//vincula el parametro
        $consulta->execute();//ejecuta la consulta

    break;

    case 'borrar':
        $sql="DELETE FROM alimentos WHERE id=:id";//consulta para borrar un alimento
        $consulta=$conexionBD->prepare($sql);//prepara la consulta
        $consulta->bindParam(':id', $id);//vincula el parametro
        $consulta->execute();//ejecuta la consulta
        
    break;

    case 'Seleccionar':
        $sql="SELECT * FROM alimentos WHERE id=:id";//consulta para seleccionar un alimento
        $consulta=$conexionBD->prepare($sql);//prepara la consulta
        $consulta->bindParam(':id', $id);//vincula el parametro
        $consulta->execute();//ejecuta la consulta
        $alimento=$consulta->fetch(PDO::FETCH_ASSOC);//obtiene el registro de la consulta
        $nombre_alimento=$alimento['nombre_alimento'];//obtiene el nombre del alimento
        
    break;
    }
}

$consulta=$conexionBD->prepare("SELECT * FROM alimentos");//prepara la consulta
$consulta->execute();//ejecuta la consulta
$listaAlimentos=$consulta->fetchAll();//obtiene los registros de la consulta

?>