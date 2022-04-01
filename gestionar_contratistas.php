<?php include("conexion.php"); ?>
<?php


?>
<!-- MODAL QUE CONFIRMA LA ELIMINACION
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ...
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
-->


<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Tabla de Contratistas
                        <div class="page-title-subheading">Aquí puedes consultar la informacion de cada contratista.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fila que contiene la información de la página -->
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Listado de Contratos</h5>
                        <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                        <div class="bg-light my-5">
                                <h6><b>Atención:</h6>
                                <h6><b>- Para filtrar la siguiente tabla puedes buscar el contratista por cualquier criterio que desees (ID del contratista, Número de cédula, Nombre del contratista, Email, teléfono, Nivel educativo, Número del contrato o valor), solo escribe el criterio deseado en el campo correspondiente a la búsqueda y la tabla se filtrara automáticamente.</b></h6> 
                            </div>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Número de Cédula</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Nivel Educativo</th>
                                    <th>Número de Contrato</th>
                                    <th>Valor</th>
                                    <!-- <th width="10%">Gestionar</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Gestiono solo los contratos de la dependencia
                                $id_dependencia = $_SESSION["id_dependencia"];


                                $sentencia = "SELECT * FROM contratista inner join contrato on contratista.fk_id_contrato=contrato.id_contrato where contratista.activado = 1 order by id_contratista desc";
                                $resultado = $conexion->query($sentencia);
                                if ($resultado) {
                                    while ($fila = $resultado->fetch_object()) { ?>
                                        <tr>
                                            <td><?php echo $fila->id_contratista ?></td>
                                            <td><img width="30" class="rounded-circle" src="<?php echo $fila->foto; ?>" alt=""></td>
                                            <td><?php echo $fila->cedula ?></td>
                                            <td><a href="informacion_contratista.php?id_contratista=<?php echo $fila->id_contratista ?>"><?php echo $fila->nombres. " ". $fila->apellidos ?></a></td>
                                            <td><?php echo $fila->usuario ?></td>
                                            <td><?php echo $fila->telefono ?></td>
                                            <td><?php echo $fila->nivel_educativo ?></td>
                                            <td><?php echo $fila->numero ?></td>
                                            <td><?php echo "$" . number_format($fila->valor) ?></td>
                                            <!-- <td>
                                                <a href="eliminar_contratista.php?id_contratista=<?php echo $fila->id_contratista ?>" class="btn btn-danger"><i class="metismenu-icon pe-7s-trash"></i></a>
                                                <a href="editar_contratista.php?id_contratista=<?php echo $fila->id_contratista ?>" class="btn btn-primary"><i class="metismenu-icon pe-7s-pen"></i></a>
                                            </td> -->
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("pie.php"); ?>
</div>
?>