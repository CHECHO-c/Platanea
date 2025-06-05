<div class="content-wrapper" style="min-height: 717px">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Administrar productos</h1>
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
                                data-toggle="modal" data-target="#modal-crear-productos">
                                Crear nuevo producto
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablaProductos"
                                    class="table table-bordered table-striped dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 12px">#</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>
                                            <th>Foto</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $productos = ctrProductos::ctrMostrarProductos();

                                        foreach ($productos as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo ($key + 1) ?></td>
                                                <td><?php echo $value["nombre"] ?></td>
                                                <td><?php echo $value["descripcion"] ?></td>
                                                <td><?php echo $value["precio"] ?></td>
                                                <td><img src="<?php echo $value["foto"] ?>" width="40px" height="40px"></td>
                                                <td>
                                                    <div class="btn-group ">
                                                        <button class="btn btn-warning btnEditarProducto"
                                                            data-toggle="modal" style="padding: 8px 10px;"
                                                            data-target="#modal-editar-productos"
                                                            idProducto="<?php echo $value["id_producto"] ?>"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <button class="btn btn-danger btnEliminarProducto"
                                                            style="padding: 8px 10px;"
                                                            idProductoE="<?php echo $value["id_producto"] ?>"
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
Modal Crear productos
======================================-->
<div class="modal modal-default fade" id="modal-crear-productos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nuevo producto</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre del producto">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <textarea class="form-control" name="descripcion_producto"
                        placeholder="Descripción del producto"></textarea>
                    <span class="glyphicon glyphicon-comment form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="number" class="form-control" name="precio_producto" placeholder="Precio del producto">
                    <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fa fa-image"></i> Adjuntar Imagen del producto
                        <input type="file" name="subirImgProducto">
                    </div>
                    <img class="previsualizarImgProducto img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php
                $guardarProductos = new ctrProductos();
                $guardarProductos->ctrGuardarProductos();
                ?>
            </form>
        </div>
    </div>
</div>


<!--=====================================
Modal Editar productos
======================================-->
<div class="modal modal-default fade" id="modal-editar-productos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Editar producto</h4>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" id="idProductoE" name="idProductoE">
                    <input type="text" class="form-control" id="nombre_productoE" name="nombre_productoE"
                        placeholder="Nombre del producto">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <textarea class="form-control" id="descripcion_productoE" name="descripcion_productoE"
                        placeholder="Descripción del producto"></textarea>
                    <span class="glyphicon glyphicon-comment form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="number" class="form-control" id="precio_productoE" name="precio_productoE"
                        placeholder="Precio del producto">
                    <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fa fa-image"></i> Adjuntar Imagen del producto
                        <input type="file" name="subirImgProducto">
                    </div>
                    <input type="hidden" id="fotoActualE" name="fotoActualE">
                    <img id="previsualizarImgProducto" class="previsualizarImgProducto img-fluid py-2" width='200'
                        height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

                <?php
                $editarProductos = new ctrProductos();
                $editarProductos->ctrEditarProductos();
                ?>
            </form>
        </div>
    </div>
</div>