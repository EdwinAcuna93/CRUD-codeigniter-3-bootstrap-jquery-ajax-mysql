
//funcion para buscar un registro en especifico esta fucion se ejecuta desde el boton de la tabla
function buscarCategoriaEliminar(id){
    $('#datosCategoria').html("");
    $.ajax({
        method:'post',
        url:'http://localhost/crud/index.php/CategoriasController/buscarPorId',
        data:{
            id:id,
        },
        success:cargarDatosEliminar,
        error:errorCargarDatosELiminar
    });
}

//funcion para enviar los datos de la consulta de buscar por id y se carguen en el modal de eliminar
function cargarDatosEliminar(e){
    $('#datosCategoria').html("");
    let cat= e[0];//recibir el json y guardarlo en una variable
    $('#idE').val(cat.id_categoria);//asignar el valor del id al input idE
    $('#nombreE').val(cat.nombre);//asignar el valor del nombre al input nombreE
    $('#descripcionE').val(cat.descripcion);//asignar el valor del la direccion al input direccionE
    datosCategorias();
}

//funcion de error crgar datos a eliminar
function errorCargarDatosELiminar(a){
    alert('Error'+a);
    datosCategorias();
}

//funcion para eliminar un registro este metodo se ejecuta con el  boton del modal
function eliminarCategoria(){
    $('#datosCategoria').html("");
    $.ajax({
        method:'post',
        url:'http://localhost/crud/index.php/CategoriasController/eliminar',
        data:{
            id:$('#idE').val()
        },
        success:categoriaEliminada,
        error:errorELiminar
    });
}

//funcion para notificar si se elimino el registro
function categoriaEliminada(a){
    alert(a);
    datosCategorias();
}

//funcion de error de conexion
function errorELiminar(a){
    alert('Error eliminar'+a);
    datosCategorias();
   
}
