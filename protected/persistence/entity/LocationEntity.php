<?php

/** @Entity @Table(name="MEDS_LOCATION") **/
class LocationEntity 	{

    /** @Id @Column(name="LOCATION_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $locationId;
    /** @Column(name="LONGITUDE" , type="float" , length=30 , nullable=false) **/
    protected $longitude;
    /** @Column(name="LATITUDE" , type="float" , length=30 , nullable=false) **/
    protected $latitude;
    /** @Column(name="ADDRESS" , type="string" , length=10 , nullable=false) **/
    protected $address;

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
?>
