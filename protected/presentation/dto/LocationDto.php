<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class LocationDto extends Dto 	{

    private $locationId;
    private $longitude;
    private $latitude;
    private $address;

	public function __construct()	{
	}

    public function getLocationId()	{
		return $this->locationId;
	}

	public function setLocationId($locationId)	{
		$this->locationId = $locationId;
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


}

class LocationListDto extends Dto {

	private $locations = array();

	public function getLocations()	{
		return $this->locations;
	}

	public function setLocations($locations)	{
		$this->locations = $locations;
	}

}
?>
