
//funcion para buscar un solo registro, este metodo lo manda el modal de editar
function buscarCategoriaEditar(id){
    $('#datosCategoria').html("");
    $.ajax({
        method:'post',
        url:'http://localhost/crud/index.php/CategoriasController/buscarPorId',
        data:{
            id:id,
        },
        success:cargarDatosEditar,
        error:errorCargarDatosEditar
    });
}

//funcion para enviar los datos de un registro al modal de editar
function cargarDatosEditar(e){
    $('#datosCategoria').html("");
    let categoria = e[0];//recibir el json y guardarlo en una variable
    $('#idM').val(categoria.id_categoria);//asignar el valor del id al input idM
    $('#nombreM').val(categoria.nombre);//asignar el valor del nombre al input nombreM
    $('#descripcionM').val(categoria.descripcion);//asignar el valor del desc al input pesoM
    datosCategorias();
}

//funcion de error de conexion
function errorCargarDatosEditar(a){
    alert('Error al procesar la peticion'+a);
    datosCategorias();
}

//funcion para modificar un registro, esta funcion la activa el modal de editar
function editarCategoria(){
    $('#datosCategoria').html("");
    $.ajax({
        method:'post',
        url:'http://localhost/crud/index.php/CategoriasController/editar',
        data:{
            id:$('#idM').val(),
            nombre:$('#nombreM').val(),
            descripcion: $('#descripcionM').val(),
           
        },
        success:categoriaModificada,
        error:errorCategoriaModificada
    });
}

//funcion para notificar si se modifico el regristro
function categoriaModificada(a){
    alert(a);
    datosCategorias();

}

//funcion que notifica si hubo error en la peticion de editar el registro
function errorCategoriaModificada(a){
    alert('Error Modificar'+a);
    datosCategorias();

}
