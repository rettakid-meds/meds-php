<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'PracticeDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');

class DoctorDto extends Dto 	{

    private $doctorId;
    private $practice;
    private $user;

	public function __construct()	{
		$this->practice = new PracticeDto();
		$this->user = new UserDto();
	}

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

class DoctorListDto extends Dto {

	private $doctors = array();

	public function getDoctors()	{
		return $this->doctors;
	}

	public function setDoctors($doctors)	{
		$this->doctors = $doctors;
	}

}
?>
