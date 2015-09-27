<?php

/** @Entity @Table(name="MEDS_DEVICES_TYPE") **/
class DevicesTypeEntity 	{

    /** @Id @Column(name="DEVICES_TYPE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $devicesTypeId;
    /** @Column(name="TYPE_NAME" , type="string" , length=50 , nullable=false) **/
    protected $typeName;
    /** @Column(name="CAN_PUSH" , type="boolean" , nullable=false) **/
    protected $canPush;

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
        return ($this->canPush) ? 'true' : 'false';
	}

	public function setCanPush($canPush)	{
		$this->canPush = $canPush;
	}


}
?>
