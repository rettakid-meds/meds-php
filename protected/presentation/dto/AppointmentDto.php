<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'PracticeDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');

class AppointmentDto extends Dto 	{

    private $appointmentId;
    private $practice;
    private $user;
    private $effFrm;
    private $effTo;

	public function __construct()	{
		$this->practice = new PracticeDto();
		$this->user = new UserDto();
		$this->effFrm = new \DateTime("now");
		$this->effTo = new \DateTime("now");
	}

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

class AppointmentListDto extends Dto {

	private $appointments = array();

	public function getAppointments()	{
		return $this->appointments;
	}

	public function setAppointments($appointments)	{
		$this->appointments = $appointments;
	}

}
?>
