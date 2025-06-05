<div class="content-wrapper" style="min-height: 717px">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Administrar roles</h1>
                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card card-info card-outline">

                        <div class="card-header mb-2">
                            <button type="button" class="btn btn-success crear-rol"
                                style="margin-bottom: 20px !important" data-toggle="modal"
                                data-target="#modal-crear-roles">
                                Crear nuevo rol
                            </button>
                        </div>

                        <div class="card-body">
                            <table id="tablaRoles" class="table table-bordered table-striped dt-responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 12px">#</th>
                                        <th>Nombre de rol</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $roles = ctrRoles::ctrMostrarRoles2();
                                    foreach ($roles as $key => $value) {






                                        ?>

                                        <tr>

                                            <td><?php echo ($key + 1) ?></td>
                                            <td><?php echo $value["nombre_rol"] ?></td>

                                            <td>

                                                <div class='btn-group'>

                                                    <button class="btn btn-warning btn-sm btnEditarRoles" data-toggle="modal" style="padding: 8px 10px;"
                                                        idRol="<?php echo $value["id_rol"] ?>"
                                                        data-target="#modal-editar-rol">
                                                        <i class="fa fa-pencil text-white"></i>
                                                    </button>

                                                    <button class="btn btn-danger btn-sm eliminarRol" style="padding: 8px 10px;"
                                                        idRolesE="<?php echo $value["id_rol"] ?>" ?>
                                                        <i class=" fa fa-trash"></i>
                                                    </button>

                                                </div>

                                            </td>

                                        </tr>









                                        <?php

                                    }

                                    ?>




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<!--=====================================
Modal Crear roles
======================================-->
<div class="modal modal-default fade" id="modal-crear-roles">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nuevo rol</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_rol" placeholder="nombre de rol">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>


                <?php

                $guardarRol = new ctrRoles();
                $guardarRol->ctrGuardarRol();


                ?>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--=====================================
Modal editar roles
======================================-->
<div class="modal modal-default fade" id="modal-editar-rol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">editar rol</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" name="id_rolE">
                    <input type="text" class="form-control" name="nom_rolE" placeholder="nombre de rol">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php 

                $editarRol = new ctrRoles();
                $editarRol->ctrEditarRol();
                
                
                ?>


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>