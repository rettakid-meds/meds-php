<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'TradingDayDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'ImageDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'BioDto.php');

class PracticeDto extends Dto 	{

    private $practiceId;
    private $name;
    private $email;
    private $longitude;
    private $latitude;
    private $address;
    private $tradingDay;
    private $phone;
    private $fee;
    private $image;
    private $bio;

	public function __construct()	{
		$this->tradingDay = new TradingDayDto();
		$this->image = new ImageDto();
		$this->bio = new BioDto();
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

    public function getTradingDay()	{
		return $this->tradingDay;
	}

	public function setTradingDay($tradingDay)	{
		$this->tradingDay = $tradingDay;
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

    public function getImage()	{
		return $this->image;
	}

	public function setImage($image)	{
		$this->image = $image;
	}

    public function getBio()	{
		return $this->bio;
	}

	public function setBio($bio)	{
		$this->bio = $bio;
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
