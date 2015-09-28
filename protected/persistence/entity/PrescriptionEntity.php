<?php

/** @Entity @Table(name="MEDS_PRESCRIPTION") **/
class PrescriptionEntity 	{

    /** @Id @Column(name="PRESCRIPTION_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $prescriptionId;
    /** @ManyToOne(targetEntity="AppointmentEntity" , fetch="LAZY") @JoinColumn(name="APPOINTMENT_ID", referencedColumnName="APPOINTMENT_ID") **/
    protected $appointment;
    /** @ManyToOne(targetEntity="DoctorEntity" , fetch="LAZY") @JoinColumn(name="DOCTOR_ID", referencedColumnName="DOCTOR_ID") **/
    protected $doctor;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="USER_ID", referencedColumnName="USER_ID") **/
    protected $user;
    /** @ManyToOne(targetEntity="FileEntity" , fetch="LAZY") @JoinColumn(name="FILE_ID", referencedColumnName="FILE_ID") **/
    protected $file;
    /** @Column(name="EFF_FRM" , type="datetime" , nullable=false) **/
    protected $effFrm;
    /** @Column(name="EFF_TO" , type="datetime" , nullable=false) **/
    protected $effTo;

    public function getPrescriptionId()	{
        return $this->prescriptionId;
	}

	public function setPrescriptionId($prescriptionId)	{
		$this->prescriptionId = $prescriptionId;
	}

    public function getAppointment()	{
        return $this->appointment;
	}

	public function setAppointment($appointment)	{
		$this->appointment = $appointment;
	}

    public function getDoctor()	{
        return $this->doctor;
	}

	public function setDoctor($doctor)	{
		$this->doctor = $doctor;
	}

    public function getUser()	{
        return $this->user;
	}

	public function setUser($user)	{
		$this->user = $user;
	}

    public function getFile()	{
        return $this->file;
	}

	public function setFile($file)	{
		$this->file = $file;
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
