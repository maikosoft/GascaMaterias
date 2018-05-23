<?php
require_once 'model/subject.php';

class SubjectController{
    
    private $model;
    
    public function __CONSTRUCT(){
        if(!isset($_SESSION['email'])) {
            header('Location: index.php?sec=auth&action=index');
            exit();
        }
        $this->model = new subject();
    }
    
    public function Index(){
        
        $subjects = $this->model->GetAll();
        
        require_once 'view/template/header.php';
        require_once 'view/subject/index.php';
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