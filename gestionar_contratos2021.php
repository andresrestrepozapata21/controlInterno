<?php include("conexion.php"); ?>
<?php
error_reporting(E_ALL);

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
                    <div>Tabla de Contratos
                        <div class="page-title-subheading">Aquí consultar la información de cada contrato y del contratista vinculado a cada contrato.
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
                                <h6><b>Atención:</b> En la siguiente tabla hay dos columnas con enlaces en algunos de sus datos.</h6>
                                <h6>    
                                    - Si desea navegar hacia la página donde se detalla el <b>CONTRATO</b>, de clic en el nombre del contratista que se encuentra en la columna nombrada <b>“Información del Contrato por Contratista”</b>.
                                </h6>
                                <h6>
                                    - Si desea navegar hacia la página de generación de reportes por <b>CONTRATISTA O HISTÓRICO DE ACTIVIDADES POR CONTRATISTA</b>, de clic en el nombre del contratista que se encuentra en la columna nombrada <b>“Reportes de Contratista”</b>.
                                </h6>
                                <h6><b>- Para filtrar la siguiente tabla puedes buscar el contrato por cualquier criterio que desees (ID del contrato, Número de contrato, Nombre del contratista, Fechas de inicio o fin, Objeto o Valor), solo escribe el criterio deseado en el campo correspondiente a la búsqueda y la tabla se filtrara automáticamente.</b></h6> 
                            </div>
                                        <thead>
                                <tr>
                                    <th>ID del Contrato</th>
                                    <th>Número del Contrato</th>
                                    <th>Información del Contrato por Contratista</th>
                                    <th>Reportes del Contratista</th>
                                    <th>Fecha Inicio del Contrato</th>
                                    <th>Fecha Fin del Contrato</th>
                                    <th>Objeto del Contrato</th>
                                    <th>Valor del Contrato</th>
                                    <th>Dependencia del Contrato</th>
                                    <!-- <th width="10%">Gestionar</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Gestiono solo los contratos de la dependencia
                                $id_dependencia = $_SESSION["id_dependencia"];
                                $sentencia = "SELECT contrato.id_contrato,contrato.numero,contrato.nombre,contrato.fecha_inicio,contrato.fecha_fin,contrato.objeto,contrato.valor,dependencia.nombre as nombre_dependencia, contratista.id_contratista, contratista.nombres, contratista.apellidos FROM contrato inner join dependencia on contrato.fk_id_dependencia=dependencia.id_dependencia INNER JOIN contratista ON contratista.fk_id_contrato = contrato.id_contrato where contrato.activo=1 AND contrato.fecha_inicio BETWEEN '2021/01/01' AND '2021/12/31' order by contrato.id_contrato desc;";
                                //echo $sentencia;
                                $resultado = $conexion->query($sentencia);
                                if ($resultado) {
                                    while ($fila = $resultado->fetch_object()) { ?>
                                        <tr>
                                            <td><?php echo $fila->id_contrato ?></td>
                                            <td><?php echo $fila->numero ?></td>
                                            <td><a target="_blank" href="visualizar_contrato.php?id_contrato=<?php echo $fila->id_contrato ?>"><?php echo $fila->nombre ?></a></td>
                                            <td>
                                                <?php
                                                $nombresContratista = $fila->nombres;
                                                $apellidosContratista = $fila->apellidos;
                                                ?>
                                                <a target="_blank" href="informacion_contratista.php?id_contratista=<?php echo $fila->id_contratista ?>"><?php echo $fila->nombres . " " . $fila->apellidos ?></a>
                                            </td>
                                            <td><?php echo $fila->fecha_inicio ?></td>
                                            <td><?php echo $fila->fecha_fin ?></td>
                                            <td><?php echo $fila->objeto ?></td>
                                            <td><?php echo "$" . number_format($fila->valor) ?></td>
                                            <td><?php echo $fila->nombre_dependencia ?></td>
                                            <!-- <td>
                                                <a href="eliminar_contrato.php?id_contrato=<?php echo $fila->id_contrato ?>" class="btn btn-danger"><i class="metismenu-icon pe-7s-trash"></i></a>
                                                <a href="visualizar_contrato.php?id_contrato=<?php echo $fila->id_contrato ?>" class="btn btn-primary"><i class="metismenu-icon pe-7s-pen"></i></a>
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