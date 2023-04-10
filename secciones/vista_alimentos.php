<?php include('../templates/cabecera.php'); ?>
<?php include('../secciones/alimentos.php'); ?>

<div class="row">
    <div class="col-12">
        <br/>
    <div class="row">

<div class="col-md-5">

    <form action="" method="post">
        <div class="card">
            <div class="card-header">
                Alimentos
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text"
                        class="form-control"
                        name="id"
                        id="id"
                        value="<?php echo $id; ?>"
                        aria-describedby="helpId" placeholder="ID">
                </div>        
                <div class="mb-3">
                    <label for="nombre_alimento" class="form-label">Nombre</label>
                    <input type="text"
                        class="form-control"
                        name="nombre_alimento"
                        value="<?php echo $nombre_alimento; ?>"
                        id="nombre_alimento"
                        aria-describedby="helpId" placeholder="Nombre del alimento">
                </div>

                <div class="btn-group" role="group" aria-label="Button group name">
                    <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="editar" class="btn btn-primary">Editar</button>
                    <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
                </div>

            </div>    
        </div>
    </form>    
</div>

<div class="col-md-7">

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($listaAlimentos as $alimento) { ?>
            <tr>
                <td><?php echo $alimento['id'] ?></td>
                <td><?php echo $alimento['nombre_alimento'] ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?php echo $alimento['id']; ?>"/>
                        <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">

                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    
</div>
    
    </div>
    </div>
</div>

<?php include('../templates/pie.php'); ?>