<?php

//Extendemos del controlador por defecto de CI
class CategoriasController extends CI_Controller{
    //Generamos el constructor de la clase
    public function __construct(){
        
        //Llamamos al constructor de la clase padre
        parent::__construct();
        //Cargamos el modelo
        $this->load->model("CategoriasModel");
        $this->load->helper('url');
   
    }

    //Funcion para mostrar la vista principal
    public function ver(){
        $this->load->view('categorias.php');
    }


    //Funcion para traer todos los registros de la bd
    function listar(){
        //Guardamos en un array el resultado que nos devuelve el metodo del modelo
        $categorias['listado'] = $this->CategoriasModel->ver();
        //esta linea se agrega para formatear la salida con JSON   
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        //Cargo la vista y le paso los parametros
        echo json_encode($categorias);
    }


    //Funcion para buscar un registro en especifico de la tabla
    function buscarPorId(){
        //Obtenemos el id del registro a buscar
        $id=$this->input->post('id');
        //Guardamos el resultado
        $categoria=$this->CategoriasModel->buscarPorId($id);
        //$categoria['listado'] = $this->CategoriasModel->buscarPorId($id);

         $this->output->set_header('Content-Type: application/json; charset=utf-8');
         echo json_encode($categoria);
    }


    //FUnción para insertar un nuevo registro en la bd
    function agregar(){
        //variable utilizada para enviar mensajes de alerta al usuario
        $mensaje="";
        if ($this->input->post('nombre') && $this->input->post('descripcion')!=NULL) {
            
            //Procedemos a ejecutar el metodo del modelo para insertar y guardamos la respuesta en una variable
            $add=$this->CategoriasModel->agregar(
                $this->input->post('nombre'),
                $this->input->post('descripcion') 
            );
            if ($add) {
                $mensaje="Registro Insertado con exito";
            } else {
                $mensaje="Ocurrió un error interno al procesar la peticion";
            }
            
        } else {
            $mensaje='Los campos no pueden estar vacios para insertar una nueva categoria';
        }
         //retornamos el mensaje de respuesta al usuario
         echo json_encode($mensaje);
    }


       //FUnción para editar un  registro en la bd
       function editar(){
        //variable utilizada para enviar mensajes de alerta al usuario
        $mensaje="";
        if ($this->input->post('id')&&$this->input->post('nombre') && $this->input->post('descripcion')!=NULL) {
            
            //Procedemos a ejecutar el metodo del modelo para editar y guardamos la respuesta en una variable
            $mod=$this->CategoriasModel->modificar(
                $this->input->post('id'),
                $this->input->post('nombre'),
                $this->input->post('descripcion') 
            );
            if ($mod) {
                $mensaje="Registro modificado con éxito";
            } else {
                $mensaje="Ocurrió un error interno al procesar la petición";
            }
            
        } else {
            $mensaje='Los campos no pueden estar vacios para editar una  categoria';
        }
        //retornamos el mensaje de respuesta al usuario
        echo json_encode($mensaje);
    }


    //funcion para eliminar un registro de la bd
    public function eliminar(){
        $mensaje = "";
        $id = $this->input->post("id");
        if (is_numeric($id) && $id != NULL) {
            $eliminar = $this->CategoriasModel->eliminar($id);
            //Verficiamos la rspuesta de metodo del modelo
            if ($eliminar == true) {
                $mensaje = "Registro eliminado con exito";
            } else {
                $mensaje = "Fallo al eliminar el registro";
            }
        } else {
            $mensaje = "No ha enviado el parametro correcto para eliminar un registro";
        }
        //retornamos el mensaje de respuesta al usuario
        echo json_encode($mensaje);
    }
    
}//fin de la clase
?>