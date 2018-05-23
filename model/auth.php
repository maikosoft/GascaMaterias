<?php
class auth
{
	private $pdo;
    
    public $id;
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

	public function CheckEmailPassword($email, $password)
	{
		
		try 
		{
            $pass_md5 = md5($password);
			$stm = $this->pdo->prepare('SELECT email, password FROM "user" WHERE email = ? AND password = ?');
			          
			$stm->execute(array($email, $pass_md5));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}