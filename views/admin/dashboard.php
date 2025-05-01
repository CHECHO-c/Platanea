<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Plátano Foods</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <!-- Botón de hamburguesa -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times" style="display: none;"></i>
    </button>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar" id="sidebar">
                <div class="nav-container">
                    <div class="company-name">
                        <h4>Platanea</h4>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                <i class="fas fa-home me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="usuarios.php">
                                <i class="fas fa-users me-2"></i> Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientes.php">
                                <i class="fas fa-user-tie me-2"></i> Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="productos.php">
                                <i class="fas fa-box me-2"></i> Productos
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logout-container">
                    <a href="logout.php" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        Cerrar Sesión
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <!-- Dashboard Content -->
                <div class="container-fluid p-4">
                    <h2 class="section-title">Dashboard</h2>
                    
                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="stat-card bg-primary">
                                <div class="card-body">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h6 class="card-title">Total Usuarios</h6>
                                    <h2 class="card-text">150</h2>
                                    <div class="trend">
                                        <i class="fas fa-arrow-up"></i>
                                        <span>12% este mes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card bg-success">
                                <div class="card-body">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <h6 class="card-title">Total Clientes</h6>
                                    <h2 class="card-text">320</h2>
                                    <div class="trend">
                                        <i class="fas fa-arrow-up"></i>
                                        <span>8% este mes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card bg-warning">
                                <div class="card-body">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <h6 class="card-title">Total Productos</h6>
                                    <h2 class="card-text">45</h2>
                                    <div class="trend">
                                        <i class="fas fa-arrow-up"></i>
                                        <span>5% este mes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card bg-info">
                                <div class="card-body">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <h6 class="card-title">Ventas Totales</h6>
                                    <h2 class="card-text">$15,350</h2>
                                    <div class="trend">
                                        <i class="fas fa-arrow-up"></i>
                                        <span>15% este mes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Actividad Reciente</h5>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-sync-alt"></i> Actualizar
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Actividad</th>
                                                    <th>Usuario</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-circle bg-primary me-3">
                                                                <i class="fas fa-plus"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0">Nuevo producto agregado</h6>
                                                                <small class="text-muted">Plátano Chips Premium</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../assets/img/user-avatar.png" alt="User" class="rounded-circle me-2" style="width: 32px; height: 32px;">
                                                            <span>Juan Pérez</span>
                                                        </div>
                                                    </td>
                                                    <td>Hace 5 min</td>
                                                    <td><span class="badge bg-success">Completado</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-circle bg-warning me-3">
                                                                <i class="fas fa-sync"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0">Actualización de inventario</h6>
                                                                <small class="text-muted">Stock de Harina de Plátano</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../assets/img/user-avatar.png" alt="User" class="rounded-circle me-2" style="width: 32px; height: 32px;">
                                                            <span>María García</span>
                                                        </div>
                                                    </td>
                                                    <td>Hace 15 min</td>
                                                    <td><span class="badge bg-warning">En proceso</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-circle bg-info me-3">
                                                                <i class="fas fa-user-plus"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0">Nuevo cliente registrado</h6>
                                                                <small class="text-muted">Distribuidor ABC</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="../assets/img/user-avatar.png" alt="User" class="rounded-circle me-2" style="width: 32px; height: 32px;">
                                                            <span>Carlos López</span>
                                                        </div>
                                                    </td>
                                                    <td>Hace 30 min</td>
                                                    <td><span class="badge bg-success">Completado</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Productos Populares</h5>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-3">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/img/products/platano-chips.jpg" alt="Plátano Chips" class="rounded me-3" style="width: 48px; height: 48px; object-fit: cover;">
                                                <div>
                                                    <h6 class="mb-0">Plátano Chips</h6>
                                                    <small class="text-muted">Snacks</small>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-primary rounded-pill">150 ventas</span>
                                                <div class="text-success mt-1">
                                                    <small><i class="fas fa-arrow-up"></i> 12%</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-3">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/img/products/harina-platano.jpg" alt="Harina de Plátano" class="rounded me-3" style="width: 48px; height: 48px; object-fit: cover;">
                                                <div>
                                                    <h6 class="mb-0">Harina de Plátano</h6>
                                                    <small class="text-muted">Ingredientes</small>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-primary rounded-pill">120 ventas</span>
                                                <div class="text-success mt-1">
                                                    <small><i class="fas fa-arrow-up"></i> 8%</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-3">
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/img/products/platano-deshidratado.jpg" alt="Plátano Deshidratado" class="rounded me-3" style="width: 48px; height: 48px; object-fit: cover;">
                                                <div>
                                                    <h6 class="mb-0">Plátano Deshidratado</h6>
                                                    <small class="text-muted">Snacks</small>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-primary rounded-pill">98 ventas</span>
                                                <div class="text-success mt-1">
                                                    <small><i class="fas fa-arrow-up"></i> 5%</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
