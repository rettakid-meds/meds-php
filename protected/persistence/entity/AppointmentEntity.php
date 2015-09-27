<?php

/** @Entity @Table(name="MEDS_APPOINTMENT") **/
class AppointmentEntity 	{

    /** @Id @Column(name="APPOINTMENT_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $appointmentId;
    /** @ManyToOne(targetEntity="PracticeEntity" , fetch="LAZY") @JoinColumn(name="PRACTICE", referencedColumnName="PRACTICE_ID") **/
    protected $practice;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="USER", referencedColumnName="USER_ID") **/
    protected $user;
    /** @Column(name="EFF_FRM" , type="datetime" , nullable=false) **/
    protected $effFrm;
    /** @Column(name="EFF_TO" , type="datetime" , nullable=false) **/
    protected $effTo;

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

    public function getEffFrm()	{
        return $this->effFrm;
	}

	public function setEffFrm($effFrm)	{
		$this->effFrm = $effFrm;
	}

    public function getEffTo()	{
        return $this->effTo;
	}

	public function setEffTo($effTo)	{
		$this->effTo = $effTo;
	}


}
?>
