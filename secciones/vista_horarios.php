<?php  include('../templates/cabecera.php'); ?>
<?php  include('../secciones/horarios.php'); ?>


<div class="row">
    <div class="col-5">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    Horarios 
                </div>
                
                <div class="card-body">
                    <div class="mb-3">
                      <label for="id" class="form-label">ID</label>
                      <input type="text"
                        class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID">
                </div>

                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text"
                    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Escriba el nombre">
                </div>

                <div class="mb-3">
                  <label for="atencion" class="form-label">Atencion</label>
                  <input type="text"
                    class="form-control" name="atencion" id="atencion" aria-describedby="helpId" placeholder="Escriba el horario de atención">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Alimentos:</label>

                    <select multiple class="form control" name="alimentos[]" id="listaAlimentos">
                        <option>Selecciona una opción</option>

                        <?php foreach($alimentos as $alimento){ ?>
                            <option value="<?php echo $alimento['id'];?>" ><?php echo $alimento['id'];?> - <?php echo $alimento['nombre_alimento']; ?></option>
                        <?php } ?>
                    </select>
                
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="editar" class="btn btn-primary">Editar</button>
                    <button type="submit" name="accion" value="borrar" lass="btn btn-danger">Borrar</button>
                </div>


                </div>
                <div class="card-footer text-muted">
                </div>
            </div>

        </form>
    </div>

    <div class="col-7">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($horarios as $horario): ?>
                        <tr>
                            <td><?php echo $horario['id'];?></td>
                            <td>
                                <?php echo $horario['nombre'];?> <?php echo $horario['atencion'];?>
                                <br/>
                                <?php foreach($horario["alimentos"] as $alimento){ ?>
                                    - <a href="#"> <?php echo $alimento["nombre_alimento"]; ?>  <a/> <br/>                               
                                <?php } ?>
                            </td>
                            <td>Seleccionar</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
        
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<script>
    new TomSelect('#listaAlimentos');
</script>

<?php include('../templates/pie.php'); ?>