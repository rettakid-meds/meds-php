<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'LocationDto.php');

class PracticeDto extends Dto 	{

    private $practiceId;
    private $name;
    private $email;
    private $location;
    private $phone;
    private $fee;

	public function __construct()	{
		$this->location = new LocationDto();
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

    public function getLocation()	{
		return $this->location;
	}

	public function setLocation($location)	{
		$this->location = $location;
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
