
//Esta función se carga al finalizar de cargar el html
$(document).ready(datosCategorias);

//Funcion para listar todas las categorias
function datosCategorias(){
    $.ajax({
        method:'get',
        url:'http://localhost/crud/index.php/CategoriasController/listar',
        success:verCategorias,
        error:error
    });
}

//funcion para obtener el json de las ctegorias e insertar los datos en una tabla
function verCategorias(c){
    let lista = c.listado;//Guardar el json en una variable

    //Recorer el arreglo del  json
    lista.forEach(element => {
        $('#datosCategoria').append('<tr>'
                                +'<td>'+element.id_categoria+'</td>'
                                +'<td>'+element.nombre+'</td>'
                                +'<td>'+element.descripcion+'</td>'
                                
                                +'<td>'
                                +'<button type="button" class="btn btn-warning" onclick="buscarCategoriaEditar('+element.id_categoria+')" data-toggle="modal" data-target="#ModalModificar">Modificar</button> | '
                                +'<button type="button" class="btn btn-danger" onclick="buscarCategoriaEliminar('+element.id_categoria+')" data-toggle="modal" data-target="#ModalEliminar">Eliminar</button>'
                                +'</td>'+
                                +'</tr>');
    });
}

//funcion de error si falla la conexion
function error(e){
    alert("Ocurrió un error al procesar la petición");
}