<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Librerias -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Categorias</title>
</head>

<body>
    <!-- contenedor principal de la pagina -->
    <div class="container mt-4">
        <h2 class="text-center">Este es un CRUD realizado con Codeigniter, Jquery y Ajax</h2>

        <!-- Aqui incia la tabla que contiene los registros -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAgregar">Agregar nueva categoria</button>
        <table class="table mt-3 ">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Id Categoria </th>
                    <th>Nombre </th>
                    <th>Descripcion </th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody id="datosCategoria">


            </tbody>
        </table>
        <!-- fin de la tabla -->
    </div> <!-- fin del contenedor -->



     <!-- Modal Agregar Categoria-->
     <div id="ModalAgregar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content Agregar-->
        <div class="modal-content">
          <div class="modal-header bg-secondary text-white">
            <h4 class="modal-title">Agregar Categoria</h4>
          </div>
          <div class="modal-body">
            <form id="modalForm">
            <label>Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre de la categoria" required>
            <br>
            <label>Descripcion:</label>
            <input type="text" class="form-control" id="descripcion" placeholder="Descripcion" required>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="" data-dismiss="modal">Cancelar</button>
            <!-- Esta funcion del agregarCategoria llama lo que esta dentro del scrip agregat -->
            <button type="button" class="btn btn-success" onclick="agregarCategoria()" data-dismiss="modal">Agregar</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal Modificar -->
    <div id="ModalModificar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content Modificar-->
        <div class="modal-content">
          <div class="modal-header bg-warning text-white">
            <h4 class="modal-title">Modificar Categoria</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" class="form-control" id="idM" >
            <label>Nombre:</label>
            <input type="text" class="form-control" id="nombreM"  required="">
            <br>
            <label>Descripcion:</label>
            <input type="text" class="form-control" id="descripcionM" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" onclick="editarCategoria()" data-dismiss="modal">Modificar</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal Eliminar -->
    <div id="ModalEliminar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content Eliminar-->
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h4 class="modal-title">Eliminar Categoria</h4>
          </div>
          <div class="modal-body">
            <h4>¿En realidad desea eliminar la categoria?</h4>
            <br>
            <input type="hidden" class="form-control" id="idE" >
            <label>Nombre:</label>
            <input type="text" class="form-control" id="nombreE"  disabled>
            <br>
            <label>Descripcion:</label>
            <input type="text" class="form-control" id="descripcionE" disabled>
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="" data-dismiss="modal">Close</button>
            <!-- Esto se manda al metodo de eliminar del archivo eliminar.js -->
            <button type="button" class="btn btn-success" onclick="eliminarCategoria()" data-dismiss="modal">Eliminar</button>
          </div>
        </div>
      </div>
    </div>



































    <!-- Se incluyen los archivos JS necesarios -->
    <script type='text/javascript' src="<?php echo base_url(); ?>js/listar.js"></script> <!-- Mostrar todos los registros -->
    <script type='text/javascript' src="<?php echo base_url(); ?>js/agregarCategoria.js"></script> <!-- Agregar una nueva categoria -->
    <script type='text/javascript' src="<?php echo base_url(); ?>js/eliminarCategoria.js"></script> <!-- Eliminar categoria -->
    <script type='text/javascript' src="<?php echo base_url(); ?>js/editarCategoria.js"></script> <!-- Agregar una nueva categoria -->




</body>

</html>