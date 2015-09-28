<?php

/** @Entity @Table(name="MEDS_APPOINTMENT") **/
class AppointmentEntity 	{

    /** @Id @Column(name="APPOINTMENT_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $appointmentId;
    /** @ManyToOne(targetEntity="PracticeEntity" , fetch="LAZY") @JoinColumn(name="PRACTICE_ID", referencedColumnName="PRACTICE_ID") **/
    protected $practice;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="USER_ID", referencedColumnName="USER_ID") **/
    protected $user;
    /** @ManyToOne(targetEntity="DataContentEntity" , fetch="LAZY") @JoinColumn(name="NOTE_ID", referencedColumnName="DATA_CONTENT_ID") **/
    protected $note;
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

    public function getNote()	{
        return $this->note;
	}

	public function setNote($note)	{
		$this->note = $note;
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
