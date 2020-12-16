  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Administrar Usuario</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                          <li class="breadcrumb-item active">Usuarios</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <div class="card-tools">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                          Agregar Usuario
                      </button>
                  </div>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th style="width: 10px">#</th>
                              <th>Nombre</th>
                              <th>Usuario</th>
                              <th>Foto</th>
                              <th>Perfil</th>
                              <th>Estado</th>
                              <th>Ultimo Login</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>Usuario Administrado</td>
                              <td>Admin</td>
                              <td> <img src="views/img/usuarios/default/user.png" alt="" width="30px"></td>
                              <td>Administrador</td>
                              <td><button class="btn btn-success btn-xs">Activado</button></td>
                              <td>2017</td>
                              <td>
                                  <div class="btn-group">
                                      <button class="btn btn-warning"><i class="far fa-edit"></i></button>
                                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td>Usuario Administrado</td>
                              <td>Admin</td>
                              <td> <img src="views/img/usuarios/default/user.png" alt="" width="30px"></td>
                              <td>Administrador</td>
                              <td><button class="btn btn-success btn-xs">Activado</button></td>
                              <td>2017</td>
                              <td>
                                  <div class="btn-group">
                                      <button class="btn btn-warning"><i class="far fa-edit"></i></button>
                                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Modal -->
  <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">

              <form role="form" method="post" enctype="multipart/form-data">

                  <!-- HEADER MODAL -->
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                  <!-- CUERPO MODAL -->
                  <div class="modal-body">
                      <div class="box-body">
                          <div class="form-group">
                              <div class="input-group mb-3">
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
                                  </div>
                                  <input type="text" class="form-control" placeholder="Ingresa Nombre" name="nuevoNombre" aria-label="Ingresa Nombre" aria-describedby="basic-addon2">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group mb-3">
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                                  </div>
                                  <input type="text" class="form-control" placeholder="Ingresa usuario" name="nuevoUsuario" aria-label="Ingresa Usuario" aria-describedby="basic-addon2">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group mb-3">
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
                                  </div>
                                  <input type="password" class="form-control" placeholder="Ingresa Contraseña" name="nuevoPassword" aria-label="Ingresa Usuario" aria-describedby="basic-addon2">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group mb-3">
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-users"></i></span>
                                  </div>
                                  <select class="form-control input-lg" name="nuevoPerfil" id="">
                                      <option value="">Seleccionar Perfil</option>
                                      <option value="Administrador">Administrador </option>
                                      <option value="Especial">Especial </option>
                                      <option value="Vendedor">Vendedor </option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="panel">SUBIR FOTO</div>
                              <input type="file" id="nuevaFoto" name="nuevaFoto">
                              <p class="help-block">Peso máximo de la foto 200 MB</p>
                              <img src="views/img/usuarios/default/user.png" class="img-thumbnail" alt="" width="100px">
                          </div>
                      </div>
                  </div>

                  <!-- PIE DE PAGINA MODAL -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>

              </form>

          </div>
      </div>
  </div>