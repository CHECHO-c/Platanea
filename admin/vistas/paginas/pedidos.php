<?php
require_once "modelo/pedidos.modelo.php";
require_once "controlador/pedidos.controlador.php";

// Manejo de descarte de pedido
if (isset($_POST['descartar_pedido_id'])) {
    ctrPedidos::ctrDescartarPedido($_POST['descartar_pedido_id']);
    // Redirigir para evitar reenvío de formulario
    echo '<script>window.location = "pedidos";</script>';
    exit();
}

if (isset($_POST['cancelar_pedidoId'])) {
    ctrPedidos::ctrCancelarPedido($_POST['cancelar_pedidoId']);
    // Redirigir para evitar reenvío de formulario
    echo '<script>window.location = "pedidos";</script>';
    exit();
}

$pedidos = ctrPedidos::ctrMostrarPedidos();
?>
<link rel="stylesheet" href="vistas/css/pedidos.css">

<div class="content-wrapper" style="min-height: 717px">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar pedidos</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php if (empty($pedidos)): ?>
                    <div class="col-12">
                        <div class="alert alert-success text-center">No hay pedidos registrados.</div>
                    </div>
                <?php else: ?>
                    <?php foreach ($pedidos as $pedido): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card card-pedido shadow border-success h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="card-header bg-success text-white">
                                        <strong>Pedido #<?php echo $pedido["id_pedido"]; ?></strong>
                                    </div>
                                    <div class="card-body pb-2">
                                        <ul class="list-group list-group-flush mb-3">
                                            <li class="list-group-item"><strong>Nombre_Cliente:</strong> <?php echo $pedido["nombre"]; ?></li>
                                            <li class="list-group-item"><strong>Fecha:</strong> <?php echo $pedido["fecha"]; ?></li>
                                            <li class="list-group-item"><strong>Telefono:</strong> <?php echo $pedido["telefono"]; ?></li>
                                            <li class="list-group-item"><strong>Lista</strong> <?php echo $pedido["lista"]; ?></li>
                                            <li class="list-group-item"><strong>Total:</strong> $<?php echo $pedido["total"]; ?></li>
                                            <li class="list-group-item"><strong>Estado:</strong> <?php echo $pedido["estado"]; ?></li>
                                        </ul>

                                        
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 d-flex justify-content-end">
                                    <form method="post" style="margin-bottom:0;">
                                        <input type="hidden" name="descartar_pedido_id" value="<?php echo $pedido['id_pedido']; ?>">
                                        <button type="submit" class="btn btn-success btn-sm btn-descartar-responsive">Finalizar</button>
                                    </form>
                                    <form method="post" style="margin-bottom:0;">
                                        <input type="hidden" name="cancelar_pedidoId" value="<?php echo $pedido['id_pedido']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm btn-cancelar-responsive">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
