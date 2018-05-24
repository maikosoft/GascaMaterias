<?php
class user
{
	private $pdo;
    
    public $id_user;
    public $name;
    public $email;
	public $password;
	public $profile;

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

	// Obtiene todos los registros de usuarios
	public function GetAll()
	{
		try
		{

			$stm = $this->pdo->prepare('SELECT * FROM "user" ORDER BY profile');
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Agrega nuevo registro de usuario
	public function Add(user $data)
	{
		try 
		{
			$sql = 'INSERT INTO "user" ("name","email","password","profile") 
					VALUES (?, ?, ?, ?)';

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->name,
						$data->email,
						md5($data->password), //md5 para test
						$data->profile
					
					)
				);
			return $this->pdo->lastInsertId();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	// Verifica si email existe
	public function CheckExistEmail($email)
	{
		
		try 
		{
			$stm = $this->pdo->prepare('SELECT email FROM "user" WHERE email = ?');
			$stm->execute(array($email));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	// Elimina registro de usuario
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
}