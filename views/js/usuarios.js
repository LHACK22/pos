// SUBIR FOTO DEL USUARIO

$(".nuevaFoto").change(function(){

    var imagen = this.files[0];
    
    console.log(imagen);
    //VALIDAR FORMATO DE IMAGEN

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
        $(".nuevaFoto").val("");

        Swal.fire({
            title: "Error!",
            text: "Error al subir la imagen",
            icon: "error",
            showConfirmButton: true,
            confirmButtonText: "Ok",
            closeOnConfirm: false,
        });


    }else if(imagen["type"] > 200000000){
        Swal.fire({
            title: "Error!",
            text: "Error al subir la imagen",
            icon: "error",
            showConfirmButton: true,
            confirmButtonText: "Ok",
            closeOnConfirm: false,
        });
    }else{
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    }


});
 

//EDITAR USUARIO

$(".btnEditarUsuario").click(function(){
    var idUsuario = $(this).attr("idUsuario");
   
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#passwordActual").val(respuesta["password"]);
            $("#fotoActual").val(respuesta["foto"]);

            if(respuesta["foto"] != "")
            {
                $(".previsualizar").attr("src", respuesta["foto"])
            }
        }
    });
});