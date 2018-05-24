<?php
require_once 'model/user.php';

class UserController{
    
    private $model;
    
    public function __CONSTRUCT(){
        // validar usuario logueado
        if(!isset($_SESSION['email'])) {
            $_SESSION['error'] = "Es necesario loguearte.";
            header('Location: index.php?sec=auth&action=index');
            exit();
        // Validar perfil correcto. 0: admin, 1:maestro 2:Alumno
        } else if($_SESSION['profile'] != 0 and $_SESSION['profile'] != 1) {
            header('Location: index.php?sec=student&action=index');
            exit();
        }
        $this->model = new user();
    }
    
    public function Index(){
        //$users = new user();
        
        $users = $this->model->GetAll();
        
        require_once 'view/template/header.php';
        require_once 'view/user/index.php';
        require_once 'view/template/footer.php';
       
    }
    
    public function Add(){
        if(!empty($_POST)){
            
            $user = new user();
            
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->profile = $_POST['profile'];
        
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
        $email = $_POST['email'];
        $user = $this->model->CheckExistEmail($email);
        //var_dump($user);
        if($user){
            echo 'false';
        }
        else {
            echo 'true';
        }
    }
    
    public function Delete(){
        $this->model->Delete($_POST['id_user']);
        $_SESSION['success'] = "Se ha eliminado el usuario";
        header('Location: index.php?sec=user&action=index');
        exit();
    }
}