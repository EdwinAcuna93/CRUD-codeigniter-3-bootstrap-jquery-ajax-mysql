    
<?php
//extendemos de la clase model por defecto
class CategoriasModel extends CI_Model {
    //creamos el constructor de la clase
    public function __construct(){
        //llamo al constructor de la clase padre
        parent::__construct();
        //cargamos la bd
        $this->load->database();
    }
    public function ver(){
        //Hacemos la consulta a la bd
        $consulta=$this->db->query("SELECT * FROM categoria");
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    //Este metodo es para consultar un unico registro de la bd
    public function buscarPorId($id_categoria){
        //Hacemos la consulta a la bd
        $consulta=$this->db->query("SELECT * FROM categoria WHERE id_categoria=$id_categoria ");
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    
    public function agregar($nombre,$descripcion){
        //Creamos la consulta para que se ejecute en la bd
        $consulta=$this->db->query("INSERT INTO categoria VALUES ('null','$nombre','$descripcion');");
       
        //Procedemos a verificar si la consulta se ejecuto con exito en la bd
        if($consulta==true){
            return true;
        }else{
            return false;
        }
    }
    public function modificar($id_categoria,$nombre,$descripcion){
        $consulta=$this->db->query("UPDATE categoria SET nombre='$nombre',descripcion='$descripcion' WHERE id_categoria=$id_categoria;");
     
        //Procedemos a verificar si la consulta se ejecuto con exito en la bd
        if($consulta==true){
            return true;
        }else{
            return false;
        }
    }
    public function eliminar($id_categoria){
        $consulta=$this->db->query("DELETE FROM categoria WHERE id_categoria=$id_categoria");
        //Procedemos a verificar si la consulta se ejecuto con exito en la bd
        if($consulta==true){
            return true;
        }else{
            return false;
        }
    }
}
?>