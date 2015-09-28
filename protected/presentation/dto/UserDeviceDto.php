<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'TypeDto.php');

class UserDeviceDto extends Dto 	{

    private $userDevicesId;
    private $user;
    private $type;
    private $name;
    private $devicePushId;

	public function __construct()	{
		$this->user = new UserDto();
		$this->type = new TypeDto();
	}

    public function getUserDevicesId()	{
		return $this->userDevicesId;
	}

	public function setUserDevicesId($userDevicesId)	{
		$this->userDevicesId = $userDevicesId;
	}

    public function getUser()	{
		return $this->user;
	}

	public function setUser($user)	{
		$this->user = $user;
	}

    public function getType()	{
		return $this->type;
	}

	public function setType($type)	{
		$this->type = $type;
	}

    public function getName()	{
		return $this->name;
	}

	public function setName($name)	{
		$this->name = $name;
	}

    public function getDevicePushId()	{
		return $this->devicePushId;
	}

	public function setDevicePushId($devicePushId)	{
		$this->devicePushId = $devicePushId;
	}


}

class UserDeviceListDto extends Dto {

	private $userDevices = array();

	public function getUserDevices()	{
		return $this->userDevices;
	}

	public function setUserDevices($userDevices)	{
		$this->userDevices = $userDevices;
	}

}
?>
