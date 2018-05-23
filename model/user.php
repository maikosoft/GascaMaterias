<?php
class user
{
	private $pdo;
    
    public $Id;
    public $Name;
    public $Email;
	public $Password;
	public $Profile;

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

			$stm = $this->pdo->prepare('SELECT * FROM "user"');
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
			$sql = 'INSERT INTO "user" ("Name","Email","Password","Profile") 
					VALUES (?, ?, ?, ?)';

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->Name,
						$data->Email,
						md5($data->Password),
						$data->Profile
					
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
			$stm = $this->pdo
			          ->prepare("SELECT * FROM user WHERE 'Email' = ?");
			          

			$stm->execute(array($email));
			
			return $stm->fetch(PDO::FETCH_OBJ);
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

	// public function Eliminar($id)
	// {
	// 	try 
	// 	{
	// 		$stm = $this->pdo
	// 		            ->prepare("DELETE FROM cliente WHERE id = ?");			          

	// 		$stm->execute(array($id));
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