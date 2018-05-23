<?php
class subject
{
	private $pdo;
    
    public $id_subject;
    public $name;
    public $reticle;
	public $teacher_name;
	public $hour_start;
    public $hour_end;
    public $max_students;
    public $status;
    

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

	public function GetAll()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare('SELECT * FROM "subject"');
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Add(user $data)
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

	public function CheckExistEmail($email)
	{
		
		try 
		{
			$stm = $this->pdo->prepare('SELECT email FROM "user" WHERE email = ?');
			          
			//$stm->bindValue(':email', $email, PDO::PARAM_STR);
			$stm->execute(array($email));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Delete($id)
	{
		try 
		{
			$stm = $this->pdo->prepare('DELETE FROM "user" WHERE id_user = ?');			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	// public function Obtener($id)
	// {
	// 	try 
	// 	{
	// 		$stm = $this->pdo
	// 		          ->prepare("SELECT * FROM cliente WHERE id = ?");
			          

	// 		$stm->execute(array($id));
	// 		return $stm->fetch(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) 
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }

	

	// public function Actualizar($data)
	// {
	// 	try 
	// 	{
	// 		$sql = "UPDATE cliente SET 
	// 					dni      		= ?,
	// 					Nombre          = ?, 
	// 					Apellido        = ?,
    //                     Correo        = ?,
    //                     Telefono        = ?
						
	// 			    WHERE id = ?";

	// 		$this->pdo->prepare($sql)
	// 		     ->execute(
	// 			    array(
	// 			    	$data->dni, 
    //                     $data->Nombre,                        
    //                     $data->Apellido,
    //                      $data->Correo,
    //                     $data->telefono, 
    //                     $data->id
	// 				)
	// 			);
	// 	} catch (Exception $e) 
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }

	
}