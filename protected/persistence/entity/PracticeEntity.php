<?php

/** @Entity @Table(name="MEDS_PRACTICE") **/
class PracticeEntity 	{

    /** @Id @Column(name="PRACTICE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $practiceId;
    /** @Column(name="NAME" , type="string" , length=20) **/
    protected $name;
    /** @Column(name="EMAIL" , type="string" , length=50 , nullable=false) **/
    protected $email;
    /** @ManyToOne(targetEntity="LocationEntity" , fetch="LAZY") @JoinColumn(name="LOCATION", referencedColumnName="LOCATION_ID") **/
    protected $location;
    /** @Column(name="PHONE" , type="string" , length=15) **/
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
?>
