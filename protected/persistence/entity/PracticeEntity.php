<?php

/** @Entity @Table(name="MEDS_PRACTICE") **/
class PracticeEntity 	{

    /** @Id @Column(name="PRACTICE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $practiceId;
    /** @Column(name="NAME" , type="string" , length=50) **/
    protected $name;
    /** @Column(name="EMAIL" , type="string" , length=50 , nullable=false) **/
    protected $email;
    /** @Column(name="LONGITUDE" , type="float" , length=30 , nullable=false) **/
    protected $longitude;
    /** @Column(name="LATITUDE" , type="float" , length=30 , nullable=false) **/
    protected $latitude;
    /** @Column(name="ADDRESS" , type="string" , length=200 , nullable=false) **/
    protected $address;
    /** @Column(name="PHONE" , type="string" , length=20) **/
    protected $phone;
    /** @Column(name="FEE" , type="float" , length=30) **/
    protected $fee;

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
?>
