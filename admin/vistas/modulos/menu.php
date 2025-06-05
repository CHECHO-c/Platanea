<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $admin['foto'] ?>" class="img-fluid"
          style="width: 38px; height: 38px; object-fit: cover; border-radius: 24px;" alt="User Image">
            </div>
      <div class="pull-left info">
        <p><?php echo $admin["nombre"] ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i>En línea</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">menu de navegacion</li>

      <li>
        <a href="usuarios">
          <i class="fa fa-user"></i> <span>Usuarios</span>

        </a>
      </li>
      <li>
        <a href="roles">
          <i class="fa fa-gear"></i> <span>Roles</span>

        </a>
      </li>

      <li>
        <a href="productos">
          <i class="fa fa-folder-open"></i> <span>Productos</span>

        </a>
      </li>










    </ul>
  </section>
  <!-- /.sidebar -->
</aside>