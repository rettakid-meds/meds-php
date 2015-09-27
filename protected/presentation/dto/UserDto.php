<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class UserDto extends Dto 	{

    private $userId;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $gender;
    private $age;
    private $userAllowPush;

	public function __construct()	{
	}

    public function getUserId()	{
		return $this->userId;
	}

	public function setUserId($userId)	{
		$this->userId = $userId;
	}

    public function getEmail()	{
		return $this->email;
	}

	public function setEmail($email)	{
		$this->email = $email;
	}

    public function getPassword()	{
		return $this->password;
	}

	public function setPassword($password)	{
		$this->password = $password;
	}

    public function getName()	{
		return $this->name;
	}

	public function setName($name)	{
		$this->name = $name;
	}

    public function getSurname()	{
		return $this->surname;
	}

	public function setSurname($surname)	{
		$this->surname = $surname;
	}

    public function getPhone()	{
		return $this->phone;
	}

	public function setPhone($phone)	{
		$this->phone = $phone;
	}

    public function getGender()	{
		return $this->gender;
	}

	public function setGender($gender)	{
		$this->gender = $gender;
	}

    public function getAge()	{
		return $this->age;
	}

	public function setAge($age)	{
		$this->age = $age;
	}

    public function getUserAllowPush()	{
		return $this->userAllowPush;
	}

	public function setUserAllowPush($userAllowPush)	{
		$this->userAllowPush = $userAllowPush;
	}


}

class UserListDto extends Dto {

	private $users = array();

	public function getUsers()	{
		return $this->users;
	}

	public function setUsers($users)	{
		$this->users = $users;
	}

}
?>
