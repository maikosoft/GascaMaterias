<?php
class student
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Obtiene todos los registros de materias
	public function GetStudentSubjects()
	{
		$id_user = $_SESSION['id_user'];
		try
		{
			$stm = $this->pdo->prepare('SELECT * FROM "subject_user" WHERE id_user= ?');
			$stm->execute(array($id_user));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Agrega registro de materia
	// $data object = Objecto de subject
	public function Add(subject $data)
	{
		
		try 
		{
			$sql = 'INSERT INTO "subject" ("name","reticle","teacher_name","hour_start","hour_end","max_students","status") 
					VALUES (?, ?, ?, ?, ?, ?, ?)';

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->name,
						$data->reticle,
						$data->teacher_name,
						$data->hour_start,
						$data->hour_end,
                        $data->max_students,
						$data->status
					)
				);
			return $this->pdo->lastInsertId();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	// Cambia Status de la materia
	// $id_subject string = id_subject
	// $value string = (0: desactivar, 1: activar)
	public function ChangeStatus($id_subject, $value)
	{
		
		try 
		{
			$stm = $this->pdo->prepare('UPDATE "subject" SET status = ? WHERE id_subject = ?');			          

			$stm->execute(array($value, $id_subject));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	// Elimina materia
	// $id = id_subject
	public function Delete($id)
	{
		try 
		{
			$stm = $this->pdo->prepare('DELETE FROM "subject" WHERE id_subject = ?');			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
}