<?php

/** @Entity @Table(name="MEDS_APPOINTMENT") **/
class AppointmentEntity 	{

    /** @Id @Column(name="APPOINTMENT_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $appointmentId;
    /** @ManyToOne(targetEntity="PracticeEntity" , fetch="LAZY") @JoinColumn(name="PRACTICE", referencedColumnName="PRACTICE_ID") **/
    protected $practice;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="USER", referencedColumnName="USER_ID") **/
    protected $user;
    /** @Column(name="EXPECTED_FRM" , type="datetime" , nullable=false) **/
    protected $expectedFrm;
    /** @Column(name="EXPECTED_TO" , type="datetime" , nullable=false) **/
    protected $expectedTo;
    /** @Column(name="ACTUAL_FRM" , type="datetime") **/
    protected $actualFrm;
    /** @Column(name="ACTUAL_TO" , type="datetime") **/
    protected $actualTo;

    public function getAppointmentId()	{
        return $this->appointmentId;
	}

	public function setAppointmentId($appointmentId)	{
		$this->appointmentId = $appointmentId;
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

    public function getExpectedFrm()	{
        return $this->expectedFrm;
	}

	public function setExpectedFrm($expectedFrm)	{
		$this->expectedFrm = $expectedFrm;
	}

    public function getExpectedTo()	{
        return $this->expectedTo;
	}

	public function setExpectedTo($expectedTo)	{
		$this->expectedTo = $expectedTo;
	}

    public function getActualFrm()	{
        return $this->actualFrm;
	}

	public function setActualFrm($actualFrm)	{
		$this->actualFrm = $actualFrm;
	}

    public function getActualTo()	{
        return $this->actualTo;
	}

	public function setActualTo($actualTo)	{
		$this->actualTo = $actualTo;
	}


}
?>
