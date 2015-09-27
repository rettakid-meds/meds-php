<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class PracticeDto extends Dto 	{

    private $practiceId;
    private $name;
    private $email;
    private $longitude;
    private $latitude;
    private $address;
    private $phone;
    private $fee;

	public function __construct()	{
	}

    public function getPracticeId()	{
		return $this->practiceId;
	}

	public function setPracticeId($practiceId)	{
		$this->practiceId = $practiceId;
	}

    public function getName()	{
		return $this->name;
	}

	public function setName($name)	{
		$this->name = $name;
	}

    public function getEmail()	{
		return $this->email;
	}

	public function setEmail($email)	{
		$this->email = $email;
	}

    public function getLongitude()	{
		return $this->longitude;
	}

	public function setLongitude($longitude)	{
		$this->longitude = $longitude;
	}

    public function getLatitude()	{
		return $this->latitude;
	}

	public function setLatitude($latitude)	{
		$this->latitude = $latitude;
	}

    public function getAddress()	{
		return $this->address;
	}

	public function setAddress($address)	{
		$this->address = $address;
	}

    public function getPhone()	{
		return $this->phone;
	}

	public function setPhone($phone)	{
		$this->phone = $phone;
	}

    public function getFee()	{
		return $this->fee;
	}

	public function setFee($fee)	{
		$this->fee = $fee;
	}


}

class PracticeListDto extends Dto {

	private $practices = array();

	public function getPractices()	{
		return $this->practices;
	}

	public function setPractices($practices)	{
		$this->practices = $practices;
	}

}
?>
