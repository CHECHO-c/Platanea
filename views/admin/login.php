<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - Plátano Foods</title>
      <!-- Bootstrap 5 CSS -->
      <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/css/font-awesome.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
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
                        <h4>Plátano Foods</h4>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
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
                            <a class="nav-link active" href="productos.php">
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
                <!-- Products Content -->
                <div class="container-fluid p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-title mb-0">Gestión de Productos</h2>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                            <i class="fas fa-plus me-2"></i>Nuevo Producto
                        </button>
                    </div>

                    <!-- Filters -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Categoría</label>
                                    <select class="form-select">
                                        <option value="">Todas las categorías</option>
                                        <option value="platano">Plátano</option>
                                        <option value="platano-verde">Plátano Verde</option>
                                        <option value="platano-maduro">Plátano Maduro</option>
                                        <option value="platano-frito">Plátano Frito</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select">
                                        <option value="">Todos los estados</option>
                                        <option value="active">Activo</option>
                                        <option value="inactive">Inactivo</option>
                                        <option value="out-of-stock">Sin stock</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Ordenar por</label>
                                    <select class="form-select">
                                        <option value="name">Nombre</option>
                                        <option value="price">Precio</option>
                                        <option value="stock">Stock</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="row g-4">
                        <!-- Product Card 1 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img src="../assets/img/products/platano-maduro.jpg" class="card-img-top" alt="Plátano Maduro">
                                    <div class="position-absolute top-0 end-0 p-2">
                                        <span class="badge bg-success">En stock</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Plátano Maduro Premium</h5>
                                    <p class="card-text text-muted">Plátanos maduros de primera calidad, perfectos para consumo directo.</p>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="h5 mb-0">€2.99/kg</span>
                                        <span class="text-muted">Stock: 150 kg</span>
                                    </div>
                                    <div class="btn-group w-100">
                                        <button class="btn btn-outline-primary">
                                            <i class="fas fa-edit me-2"></i>Editar
                                        </button>
                                        <button class="btn btn-outline-danger">
                                            <i class="fas fa-trash me-2"></i>Eliminar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 2 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img src="../assets/img/products/platano-verde.jpg" class="card-img-top" alt="Plátano Verde">
                                    <div class="position-absolute top-0 end-0 p-2">
                                        <span class="badge bg-warning">Stock bajo</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Plátano Verde</h5>
                                    <p class="card-text text-muted">Plátanos verdes frescos, ideales para cocinar y freír.</p>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="h5 mb-0">€1.99/kg</span>
                                        <span class="text-muted">Stock: 25 kg</span>
                                    </div>
                                    <div class="btn-group w-100">
                                        <button class="btn btn-outline-primary">
                                            <i class="fas fa-edit me-2"></i>Editar
                                        </button>
                                        <button class="btn btn-outline-danger">
                                            <i class="fas fa-trash me-2"></i>Eliminar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 3 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img src="../assets/img/products/platano-frito.jpg" class="card-img-top" alt="Plátano Frito">
                                    <div class="position-absolute top-0 end-0 p-2">
                                        <span class="badge bg-danger">Sin stock</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Plátano Frito</h5>
                                    <p class="card-text text-muted">Plátanos fritos crujientes, listos para servir.</p>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="h5 mb-0">€4.99/kg</span>
                                        <span class="text-muted">Stock: 0 kg</span>
                                    </div>
                                    <div class="btn-group w-100">
                                        <button class="btn btn-outline-primary">
                                            <i class="fas fa-edit me-2"></i>Editar
                                        </button>
                                        <button class="btn btn-outline-danger">
                                            <i class="fas fa-trash me-2"></i>Eliminar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav class="mt-4" aria-label="Navegación de páginas">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Siguiente">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoría</label>
                            <select class="form-select" required>
                                <option value="">Seleccionar categoría</option>
                                <option value="platano">Plátano</option>
                                <option value="platano-verde">Plátano Verde</option>
                                <option value="platano-maduro">Plátano Maduro</option>
                                <option value="platano-frito">Plátano Frito</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Precio por kg</label>
                            <div class="input-group">
                                <span class="input-group-text">€</span>
                                <input type="number" class="form-control" step="0.01" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stock (kg)</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen del producto</label>
                            <input type="file" class="form-control" accept="image/*" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Bootstrap 5 JS Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../../assets/js/dashboard.js"></script>
</body>
</html> 
