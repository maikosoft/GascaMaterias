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
    public function SaveSubjects(){
        if(!empty($_POST)){
            // obtenemos los ids dentro del input ej: "3,4,5,"
            $id_subjects = $_POST['txt_selected_subjects'];
            // separamos los id en array
            $arr_ids = explode(",", $id_subjects);
            // recorremos array para guardar en tabla de relacion
            foreach($arr_ids as $id_subject) {
                if($id_subject != '') {
                    $this->student_model->AddStudentSubjects($id_subject);
                }
            }
            $_SESSION['success'] = "Se han guardado tus materias seleccionadas";
            header('Location: index.php?sec=student&action=index');
            exit();
        } else { // redireccionamos a index
            header('Location: index.php?sec=student&action=index');
            exit();
        }
        
    }
}