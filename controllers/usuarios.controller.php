<?php

class ControllerUsuarios
{
    static public function ctrIngresoUsario()
    {
        if (isset($_POST["ingUsuario"])) {
            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
            ) {

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');

                $tabla = "usuarios";

                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModelUsuario::MdlMostrarUsuario($tabla, $item, $valor);

                if (
                    $respuesta["usuario"] == $_POST["ingUsuario"] &&
                    $respuesta["password"] == $encriptar
                ) {

                    $_SESSION["iniciarSeccion"] = "ok";
                    $_SESSION["id"] =  $respuesta["id"];
                    $_SESSION["nombre"] =  $respuesta["nombre"];
                    $_SESSION["usuario"] =  $respuesta["usuario"];
                    $_SESSION["perfil"] =  $respuesta["perfil"];
                    $_SESSION["foto"] =  $respuesta["foto"];

                    echo '<script>
                        window.location = "home";
                    </script>';
                } else {
                    echo '<br> <div class="alert alert-danger">Error al ingresar</div>';
                }
            } else {
                echo '<br> <div class="alert alert-danger">Caracteres Incorrector</div>';
            }
        }
    }

    static public function ctrCrearUsuario()
    {

        if (isset($_POST["nuevoUsuario"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
            ) {

                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    // CREAR DIRECTORIO PARA GUARDAR FOTO

                    $dierectorio = "views/img/usuarios/" . $_POST["nuevoUsuario"];
                    mkdir($dierectorio, 0755);

                    //GUARDAMOS LA FOTO EN EL DIRECTORIO DEM ACUERO AL TIPO DE IMAGEN

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "views/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpeg";
                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "views/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$usesomesillystringforsalt$');

                $datos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" => $encriptar,
                    "perfil" => $_POST["nuevoPerfil"],
                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta
                );

                $respuesta = ModelUsuario::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        Swal.fire({
                            type: "success",
                            title: "Exito!",
                            text: "El usuario se guardo correctamente",
                            icon: "success",
                            showConfirmButton: true,
                            confirmButtonText: "Ok",
                            closeOnConfirm: false,
                          }).then((result)=>{
                            if(result.value){
                                window.location = "usuarios";
                            }
                          });

                        </script>';
                }
            } else {
                echo '<script>

                    Swal.fire({
                        title: "Error!",
                        text: "El usuario no puede llevar caracteres especiales",
                        icon: "error",
                        showConfirmButton: true,
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                      }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                      });

                    </script>';
            }
        }
    }

    static public function ctrMostrarUsuario($item, $valor)
    {
        $tabla = "usuarios";
        $respuesta = ModelUsuario::MdlMostrarUsuario($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrEditarUsuario()
    {

        //VALIDAR SI EL INPUT NOMBRE VIENE CON DATOS
        if (isset($_POST["editarNombre"])) {

            //VALIDACION REGULAR EXPRESION PARA EL CAMPO NOMBRE
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                //ASIGNO EL NOMBRE DE LA FOTO ACTUAL
                $ruta = $_POST["fotoActual"];

                //VALIDAR SI EL INPUT EDITAR FOTOS
                if (isset($_FILES["editarFoto"]["tmp_name"])) {

                    //OBTENGO ANCHO Y ALTO DE LA FOTO
                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    //DECLARO LAS NUEVAS DIMENSIONES
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    // CREAR DIRECTORIO PARA GUARDAR FOTO
                    $dierectorio = "views/img/usuarios/" . $_POST["editarUsuario"];

                    //PREGUNTAR SI YA EXISTE LA IMAGEN EN BD
                    if (!empty($_POST["fotoActual"])) {
                        unlink($_POST["fotoActual"]);
                    } else {
                        mkdir($dierectorio, 0755);
                    }



                    //GUARDAMOS LA FOTO EN EL DIRECTORIO DEMACUERO AL TIPO DE IMAGEN 
                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "views/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpeg";
                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["editarFoto"]["type"] == "image/png") {

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "views/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                //VALIDO SI VA A EDITAR PASSWORD
                if ($_POST["editarPassword"] != "") {
                    if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPassword"])) {
                        //ASIGNO A VARIABLE PASSWORD ENCRIPTADA
                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$usesomesillystringforsalt$');
                    } else {
                        echo '<script>

                        Swal.fire({
                            title: "Error!",
                            text: "La contraseña no puede ir vacia",
                            icon: "error",
                            showConfirmButton: true,
                            confirmButtonText: "Ok",
                            closeOnConfirm: false,
                          }).then((result)=>{
                            if(result.value){
                                window.location = "usuarios";
                            }
                          });
    
                        </script>';
                    }
                } else {
                    $encriptar = $_POST["passwordActual"];
                }

                $datos = array(
                    "nombre" => $_POST["editarNombre"],
                    "usuario" => $_POST["editarUsuario"],
                    "password" => $encriptar,
                    "perfil" => $_POST["editarPerfil"],
                    "foto" => $ruta
                );

                $respuesta = ModelUsuario::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        Swal.fire({
                            type: "success",
                            title: "Exito!",
                            text: "El usuario se modifico correctamente",
                            icon: "success",
                            showConfirmButton: true,
                            confirmButtonText: "Ok",
                            closeOnConfirm: false,
                          }).then((result)=>{
                            if(result.value){
                                window.location = "usuarios";
                            }
                          });

                        </script>';
                }
            } else {
                echo '<script>

                    Swal.fire({
                        title: "Error!",
                        text: "El nombre no puede ir vacío",
                        icon: "error",
                        showConfirmButton: true,
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                      }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                      });

                    </script>';
            }
        }
    }
}
