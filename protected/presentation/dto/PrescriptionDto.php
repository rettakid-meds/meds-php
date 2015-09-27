<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'AppointmentDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'DoctorDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');

class PrescriptionDto extends Dto 	{

    private $prescriptionId;
    private $appointment;
    private $doctor;
    private $user;
    private $effFrm;
    private $effTo;

	public function __construct()	{
		$this->appointment = new AppointmentDto();
		$this->doctor = new DoctorDto();
		$this->user = new UserDto();
		$this->effFrm = new \DateTime("now");
		$this->effTo = new \DateTime("now");
	}

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

class PrescriptionListDto extends Dto {

	private $prescriptions = array();

	public function getPrescriptions()	{
		return $this->prescriptions;
	}

	public function setPrescriptions($prescriptions)	{
		$this->prescriptions = $prescriptions;
	}

}
?>
