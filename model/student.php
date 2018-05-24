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
			$stm = $this->pdo->prepare('SELECT "subject".*, "subject_user".* FROM "subject_user" 
			LEFT JOIN "subject" ON "subject".id_subject = "subject_user".id_subject
			WHERE "subject_user".id_user = ?');
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
	public function AddStudentSubjects($id_subject)
	{
		
		try 
		{
			$sql = 'INSERT INTO "subject_user" ("id_user","id_subject") 
					VALUES (?, ?)';

			$this->pdo->prepare($sql)
				->execute(
					array($_SESSION['id_user'], $id_subject)
				);
			//return $this->pdo->lastInsertId();
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