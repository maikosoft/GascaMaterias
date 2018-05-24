<?php
require_once 'model/student.php';
require_once 'model/subject.php';

class StudentController{
    
    private $subject_model;
    private $student_model;
    
    public function __CONSTRUCT(){
        // validar usuario logueado
        if(!isset($_SESSION['email'])) {
            $_SESSION['error'] = "Es necesario loguearte.";
            header('Location: index.php?sec=auth&action=index');
            exit();
        // Validar perfil correcto. 0: admin, 1:maestro 2:Alumno
        } else if($_SESSION['profile'] != 2) {
            header('Location: index.php?sec=user&action=index');
            exit();
        }
        $this->subject_model = new subject();
        $this->student_model = new student();
    }
    
    // Lista todos los registros de materias
    public function Index(){
        $subjects = $this->subject_model->GetAll($active = true);
        $student_subjects = $this->student_model->GetStudentSubjects();

        require_once 'view/template/header.php';
        require_once 'view/student/index.php';
        require_once 'view/template/footer.php';
    }
    
    // Agrega nuevo registro de materia
    public function Add(){
        if(!empty($_POST)){
            $subject = new subject();
            $subject->name = $_POST['name'];
            $subject->reticle = $_POST['reticle'];
            $subject->teacher_name = $_POST['teacher_name'];
            $subject->hour_start = $_POST['hour_start'];
            $subject->hour_end = $_POST['hour_end'];
            $subject->max_students = $_POST['max_students'];
            $subject->status = $_POST['status'];
            $insert_id = $this->model->Add($subject);
            // devuelve el Id insertado
            if($insert_id > 0){
                $_SESSION['success'] = "Se ha guardado la materia";
                header('Location: index.php?sec=subject&action=index');
                exit();
            } else {
                $_SESSION['error'] = "No se ha podido guardar. Contacte al administrador";
            }
        } else {
            require_once 'view/template/header.php';
            require_once 'view/subject/add.php';
            require_once 'view/template/footer.php';
        }
        
    }

    // Cambia el status de la materia
    // params
    // id_subject : id_subject de la materia
    // value: 0: inactivo, 1: activo
    public function ChangeStatus(){
        $id_subject = $_GET['id_subject'];
        $value  = $_GET['value'];
        
        $this->model->ChangeStatus($id_subject, $value);
        $_SESSION['success'] = "Se ha cambiado el estado de la materia";
        header('Location: index.php?sec=subject&action=index');
        exit();
    }

    // Elimina registro de materias(subjects)
    // params:
    // id_subject: POST id_subject
    public function Delete(){
        $this->model->Delete($_POST['id_subject']);
        $_SESSION['success'] = "Se ha eliminado la materia";
        header('Location: index.php?sec=subject&action=index');
        exit();
    }
}