//funcion para agregar una nueva categoria
function agregarCategoria(){
    $('#datosCategoria').html("");
    $.ajax({
        method:'post',
        url:'http://localhost/crud/index.php/CategoriasController/agregar',
        data:{
            nombre:$('#nombre').val(),
            descripcion:$('#descripcion').val()
        },
        success:agregar,
        error:errorAgregar
    });
}

//Imprimimos el resultado de la peticion y recargamos los datos de la tabla
function agregar(response){
        //swal("Good job!",response, "success"); 
        alert(response); 
        
        //limpiamos el modal de agregar
        $('#modalForm')[0].reset();
        //Mandamos a llamar a la peticion que lista todos los registros
          datosCategorias(); 
}

//funcion para error de conexion
function errorAgregar(e){
   // swal("Error",e, "error");    
   alert("Ocurrio un error"+e);
    //Mandamos a llamar a la peticion que lista todos los registros
    datosCategorias();
}