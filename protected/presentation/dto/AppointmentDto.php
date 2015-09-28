<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'PracticeDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'DataContentDto.php');

class AppointmentDto extends Dto 	{

    private $appointmentId;
    private $practice;
    private $user;
    private $note;
    private $expectedFrm;
    private $expectedTo;
    private $actualFrm;
    private $actualTo;

	public function __construct()	{
		$this->practice = new PracticeDto();
		$this->user = new UserDto();
		$this->note = new DataContentDto();
		$this->expectedFrm = new \DateTime("now");
		$this->expectedTo = new \DateTime("now");
		$this->actualFrm = new \DateTime("now");
		$this->actualTo = new \DateTime("now");
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
