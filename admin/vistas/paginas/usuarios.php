<div class="content-wrapper" style="min-height: 717px">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Administrar usuarios</h1>
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
                            <button type="button" class="btn btn-success" style="margin-bottom: 20px !important"
                                data-toggle="modal" data-target="#modal-crear-usuarios">
                                Crear nuevo usuario
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablaUsuarios"
                                    class="table table-bordered table-striped dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 12px">#</th>
                                            <th>Nombre</th>
                                            <th>Correo electrónico</th>
                                            <th>Telefono</th>
                                            <th>Foto</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php ?>

                                        <?php
                                        foreach ($usuarios as $key => $value) {

                                            $item = "id_rol";

                                            $valor = $value["id_rol"];

                                            $roles = ctrRoles::ctrMostrarRoles($item, $valor)

                                                ?>

                                            <tr>
                                                <td><?php echo ($key + 1) ?></td>
                                                <td><?php echo $value["nombre"] ?></td>
                                                <td class="emailType"><?php echo $value["correo"] ?></td>
                                                <td><?php echo $value["telefono"] ?></td>
                                                <td><img src="<?php echo $value["foto"] ?>" width="40px" height="40px"></td>
                                                <td> <?php echo $roles["nombre_rol"] ?> </td>
                                                <td>
                                                    <div class="btn-group ">
                                                        <button class="btn btn-warning btnEditarUsuario" data-toggle="modal"
                                                            style="padding: 8px 10px;" data-target="#modal-editar-usuarios"
                                                            idUsuario="<?php echo $value["id_usuario"] ?></"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <button class="btn btn-danger btnEliminarUsuario"
                                                            style="padding: 8px 10px;"
                                                            idUsuarioE="<?php echo $value["id_usuario"] ?>"
                                                            rutaFoto="<?php echo $value["foto"] ?>"><i
                                                                class="fa fa-times"></i></button>
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
        </div>
    </section>

</div>

<!--=====================================
Modal Crear usuarios
======================================-->
<div class="modal modal-default fade" id="modal-crear-usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nuevo usuario</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_usuarios" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="password" class="form-control" name="pass_user" placeholder="contraseña">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="telefono" placeholder="teléfono">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="email" class="form-control" name="correo" placeholder="correo">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fa fa-image"></i> Adjuntar Imagen de usuarios
                        <input type="file" name="subirImgUsuarios">
                    </div>
                    <img class="previsualizarImgusuarios img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>

                <div class="form-group has-feedback">


                    <label>rol</label>
                    <select class="form-control" name="rol_usuario" required>

                        <?php
                        $roles = ctrRoles::ctrMostrarRoles2();

                        foreach ($roles as $rol) {

                            ?>
                            <option value="<?php echo $rol["id_rol"] ?>"><?php echo $rol["nombre_rol"] ?></option>
                            <?php
                        }
                        ?>

                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php
                $guardarUsuarios = new ctrUsuarios();
                $guardarUsuarios->ctrGuardarUsuarios();
                ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!--=====================================
Modal Editar usuarios
======================================-->
<div class="modal modal-default fade" id="modal-editar-usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Editar usuario</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" id="idPerfilE" name="idPerfilE">
                    <input type="text" class="form-control" id="nom_usuariosE" name="nom_usuariosE"
                        placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" id="pass_userActual" name="pass_userActual">
                    <input type="password" class="form-control" id="pass_userE" name="pass_userE"
                        placeholder="contraseña">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" id="telefonoE" name="telefonoE" placeholder="teléfono">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="email" class="form-control" id="correoE" name="correoE" placeholder="correo">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fa fa-image"></i> Adjuntar Imagen de usuarios
                        <input type="file" name="subirImgUsuarios">
                    </div>
                    <input type="hidden" id="fotoActualE" name="fotoActualE">
                    <img id="previsualizarImgusuarios" class="previsualizarImgusuarios img-fluid py-2" width='200'
                        height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>

                <div class="form-group has-feedback">


                    <label>rol</label>
                    <select class="form-control" name="rol_usuarioE" required>

                        <?php
                        $roles = ctrRoles::ctrMostrarRoles2();

                        foreach ($roles as $rol) {

                            ?>
                            <option value="<?php echo $rol["id_rol"] ?>"><?php echo $rol["nombre_rol"] ?></option>
                            <?php
                        }
                        ?>

                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

                <?php
                $editarUsuarios = new ctrUsuarios();
                $editarUsuarios->ctrEditarUsuarios();
                ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>