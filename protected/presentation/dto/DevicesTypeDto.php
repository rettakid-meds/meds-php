<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class DevicesTypeDto extends Dto 	{

    private $devicesTypeId;
    private $typeName;
    private $canPush;

	public function __construct()	{
	}

    public function getDevicesTypeId()	{
		return $this->devicesTypeId;
	}

	public function setDevicesTypeId($devicesTypeId)	{
		$this->devicesTypeId = $devicesTypeId;
	}

    public function getTypeName()	{
		return $this->typeName;
	}

	public function setTypeName($typeName)	{
		$this->typeName = $typeName;
	}

    public function getCanPush()	{
		return $this->canPush;
	}

	public function setCanPush($canPush)	{
		$this->canPush = $canPush;
	}


}

class DevicesTypeListDto extends Dto {

	private $devicesTypes = array();

	public function getDevicesTypes()	{
		return $this->devicesTypes;
	}

	public function setDevicesTypes($devicesTypes)	{
		$this->devicesTypes = $devicesTypes;
	}

}
?>
