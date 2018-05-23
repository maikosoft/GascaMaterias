<?php
require_once 'model/auth.php';

class AuthController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new auth();
    }
    
    public function Index(){
        if(isset($_SESSION['email'])) {
            header('Location: index.php?sec=user&action=index');
            exit();
        }
        if(!empty($_POST)){
            $user = $this->model->CheckEmailPassword($_POST['email'], $_POST['password']);
            if($user) {
                $_SESSION['email'] = $user->email;
                header('Location: index.php?sec=user&action=index');
                exit();
            }
            else {
                $_SESSION['error'] = "Email y/o usuario incorrecto";
                
            }
        }
        require_once 'view/template/header.php';
        require_once 'view/login.php';
        require_once 'view/template/footer.php';
    }

    
    public function Logout(){
        unset($_SESSION['email']);
        $_SESSION['success'] = "Se ha eliminado el usuario";
        header('Location: index.php?sec=user&action=index');
        exit();
    }
}