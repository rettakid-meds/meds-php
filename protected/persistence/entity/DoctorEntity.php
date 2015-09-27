<?php

/** @Entity @Table(name="MEDS_DOCTOR") **/
class DoctorEntity 	{

    /** @Id @Column(name="DOCTOR_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $doctorId;
    /** @ManyToOne(targetEntity="PracticeEntity" , fetch="LAZY") @JoinColumn(name="PRACTICE", referencedColumnName="PRACTICE_ID") **/
    protected $practice;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="USER", referencedColumnName="USER_ID") **/
    protected $user;

    public function getDoctorId()	{
        return $this->doctorId;
	}

	public function setDoctorId($doctorId)	{
		$this->doctorId = $doctorId;
	}

    public function getPractice()	{
        return $this->practice;
	}

	public function setPractice($practice)	{
		$this->practice = $practice;
	}

    public function getUser()	{
        return $this->user;
	}

	public function setUser($user)	{
		$this->user = $user;
	}


}
?>
