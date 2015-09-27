<?php

/** @Entity @Table(name="MEDS_USER") **/
class UserEntity 	{

    /** @Id @Column(name="USER_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $userId;
    /** @Column(name="EMAIL" , type="string" , length=50 , nullable=false) **/
    protected $email;
    /** @Column(name="PASSWORD" , type="string" , length=20 , nullable=false) **/
    protected $password;
    /** @Column(name="NAME" , type="string" , length=20) **/
    protected $name;
    /** @Column(name="SURNAME" , type="string" , length=20) **/
    protected $surname;
    /** @Column(name="PHONE" , type="string" , length=15) **/
    protected $phone;
    /** @Column(name="GENDER" , type="string" , length=9) **/
    protected $gender;
    /** @Column(name="AGE" , type="integer" , length=4) **/
    protected $age;
    /** @Column(name="USER_ALLOW_PUSH" , type="boolean" , nullable=false) **/
    protected $userAllowPush;

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
        return ($this->userAllowPush) ? 'true' : 'false';
	}

	public function setUserAllowPush($userAllowPush)	{
		$this->userAllowPush = $userAllowPush;
	}


}
?>
