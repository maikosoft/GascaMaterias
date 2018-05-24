<?php
require_once 'model/auth.php';
require_once 'model/user.php';

class AuthController{
    
    private $model;
    private $user;
    
    public function __CONSTRUCT(){
        $this->model = new auth();
        $this->user = new user();
    }
    
    public function Index(){
        
        if(isset($_SESSION['email'])) {
            header('Location: index.php?sec=user&action=index');
            exit();
        }
        if(!empty($_POST)){
            $this->user = $this->model->CheckEmailPassword($_POST['email'], $_POST['password']);
            if($this->user) {
                $_SESSION['id_user'] = $this->user->id_user;
                $_SESSION['email'] = $this->user->email;
                $_SESSION['profile'] = $this->user->profile;
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
        unset($_SESSION['id_user']);
        unset($_SESSION['email']);
        unset($_SESSION['profile']);
        $_SESSION['error'] = "Inicia sesion";
        header('Location: index.php?sec=auth&action=index');
        exit();
    }
}