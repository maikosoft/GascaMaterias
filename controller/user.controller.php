<?php
//require_once 'model/cliente.php';

class UserController{
    
    //private $model;
    
    public function __CONSTRUCT(){
        //$this->model = new cliente();
    }
    
    public function Index(){
        //echo "User - Index";
        require_once 'view/template/header.php';
        require_once 'view/user/users.php';
        require_once 'view/template/footer.php';
       
    }
    
    // public function Crud(){
    //     $cliente = new cliente();
        
    //     if(isset($_REQUEST['id'])){
    //         $cliente = $this-&gt;model-&gt;Obtener($_REQUEST['id']);
    //     }
        
    //     require_once 'view/header.php';
    //     require_once 'view/cliente/cliente-editar.php';
        
    // }
    
    // public function Guardar(){
    //     $cliente = new cliente();
        
    //     $cliente-&gt;id = $_REQUEST['id'];
    //     $cliente-&gt;dni = $_REQUEST['dni'];
    //     $cliente-&gt;Nombre = $_REQUEST['Nombre'];
    //     $cliente-&gt;Apellido = $_REQUEST['Apellido'];
    //     $cliente-&gt;Correo = $_REQUEST['Correo'];  
    //     $cliente-&gt;telefono = $_REQUEST['telefono'];    
      

    //     $cliente-&gt;id &gt; 0 
    //         ? $this-&gt;model-&gt;Actualizar($cliente)
    //         : $this-&gt;model-&gt;Registrar($cliente);
        
    //     header('Location: index.php');
    // }
    
    // public function Eliminar(){
    //     $this-&gt;model-&gt;Eliminar($_REQUEST['id']);
    //     header('Location: index.php');
    // }
}