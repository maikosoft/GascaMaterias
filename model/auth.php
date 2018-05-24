<?php
class auth
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

	// Verifica Email y password para iniciar sesion
	public function CheckEmailPassword($email, $password)
	{
		try 
		{
            $pass_md5 = md5($password); // md5 solo para test
			$stm = $this->pdo->prepare('SELECT id_user, email, password, profile FROM "user" WHERE email = ? AND password = ?');
			          
			$stm->execute(array($email, $pass_md5));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}