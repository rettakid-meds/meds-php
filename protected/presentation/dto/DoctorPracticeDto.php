<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'PracticeDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'DoctorDto.php');

class DoctorPracticeDto extends Dto 	{

    private $medsDoctorPracticeId;
    private $practice;
    private $doctor;

	public function __construct()	{
		$this->practice = new PracticeDto();
		$this->doctor = new DoctorDto();
	}

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

class DoctorPracticeListDto extends Dto {

	private $doctorPractices = array();

	public function getDoctorPractices()	{
		return $this->doctorPractices;
	}

	public function setDoctorPractices($doctorPractices)	{
		$this->doctorPractices = $doctorPractices;
	}

}
?>
