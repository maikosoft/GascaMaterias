<?php
require_once 'model/user.php';

class UserController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new user();
    }
    
    public function Index(){
        //$users = new user();
        
        $users = $this->model->GetAll();
        
        require_once 'view/template/header.php';
        require_once 'view/user/index.php';
        require_once 'view/template/footer.php';
       
    }
    
    // public function Crud(){
    //     $cliente = new cliente();
        
    //     if(isset($_REQUEST['id'])){
    //         $cliente = $this->model->Obtener($_REQUEST['id']);
    //     }
        
    //     require_once 'view/header.php';
    //     require_once 'view/cliente/cliente-editar.php';
        
    // }
    
    public function Add(){
        if(!empty($_POST)){
            
            $user = new user();
            
            $user->Name = $_POST['Name'];
            $user->Email = $_POST['Email'];
            $user->Password = $_POST['Password'];
            $user->Profile = 2;
        
            $InsertId = $this->model->Add($user);
            if($InsertId > 0){
                $_SESSION['success'] = "Se ha guardado el usuario";
                header('Location: index.php?sec=user&action=index');
                exit();
            }
        } else {
            require_once 'view/template/header.php';
            require_once 'view/user/add.php';
            require_once 'view/template/footer.php';
        }
        
    }

    public function CheckExistEmail()
    {
        $email = $_POST["email"];
        echo $email;
        
        if($this->model->CheckExistEmail($email)){
            echo json_encode(true);
        }
        else {
            echo json_encode(false);
        }
    }
    
    // public function Eliminar(){
    //     $this->model->Eliminar($_REQUEST['id']);
    //     header('Location: index.php');
    // }
}