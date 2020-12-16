  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="home" class="brand-link">
          <img src="views/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Inventary System</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">

                  <?php
                    if ($_SESSION["foto"] != "") {
                        echo '<img src="' . $_SESSION["foto"] . '" class="img-circle elevation-2" alt="User Image">';
                    } else {
                        echo ' <img src="views/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
                    }
                    ?>
                  <!-- <img src="views/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?php echo $_SESSION["nombre"] ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="home" class="nav-link">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                              Inicio
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="usuarios" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Usuario
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="categorias" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Categorias
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="productos" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Productos
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="clientes" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Clientes
                          </p>
                      </a>
                  </li>

                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Ventas
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pagina-ventas" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Administrar Ventas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="crear-ventas" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Crear Ventas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="reporte-ventas" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Reporte de ventas</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>