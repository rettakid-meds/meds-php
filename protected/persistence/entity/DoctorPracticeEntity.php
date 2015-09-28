<?php

/** @Entity @Table(name="MEDS_DOCTOR_PRACTICE") **/
class DoctorPracticeEntity 	{

    /** @Id @Column(name="MEDS_DOCTOR_PRACTICE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $medsDoctorPracticeId;
    /** @ManyToOne(targetEntity="PracticeEntity" , fetch="LAZY") @JoinColumn(name="PRACTICE_ID", referencedColumnName="PRACTICE_ID") **/
    protected $practice;
    /** @ManyToOne(targetEntity="DoctorEntity" , fetch="LAZY") @JoinColumn(name="DOCTOR_ID", referencedColumnName="DOCTOR_ID") **/
    protected $doctor;

    public function getMedsDoctorPracticeId()	{
        return $this->medsDoctorPracticeId;
	}

	public function setMedsDoctorPracticeId($medsDoctorPracticeId)	{
		$this->medsDoctorPracticeId = $medsDoctorPracticeId;
	}

    public function getPractice()	{
        return $this->practice;
	}

	public function setPractice($practice)	{
		$this->practice = $practice;
	}

    public function getDoctor()	{
        return $this->doctor;
	}

	public function setDoctor($doctor)	{
		$this->doctor = $doctor;
	}


}
?>
