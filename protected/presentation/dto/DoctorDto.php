<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'ImageDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'DataContentDto.php');

class DoctorDto extends Dto 	{

    private $doctorId;
    private $user;
    private $image;
    private $bio;

	public function __construct()	{
		$this->user = new UserDto();
		$this->image = new ImageDto();
		$this->bio = new DataContentDto();
	}

    public function getDoctorId()	{
		return $this->doctorId;
	}

	public function setDoctorId($doctorId)	{
		$this->doctorId = $doctorId;
	}

    public function getUser()	{
		return $this->user;
	}

	public function setUser($user)	{
		$this->user = $user;
	}

    public function getImage()	{
		return $this->image;
	}

	public function setImage($image)	{
		$this->image = $image;
	}

    public function getBio()	{
		return $this->bio;
	}

	public function setBio($bio)	{
		$this->bio = $bio;
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
