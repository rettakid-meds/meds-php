<?php

/** @Entity @Table(name="MEDS_USER_DEVICE") **/
class UserDeviceEntity 	{

    /** @Id @Column(name="USER_DEVICES_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $userDevicesId;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="USER_ID", referencedColumnName="USER_ID") **/
    protected $user;
    /** @ManyToOne(targetEntity="DevicesTypeEntity" , fetch="LAZY") @JoinColumn(name="TYPE_ID", referencedColumnName="DEVICES_TYPE_ID") **/
    protected $type;
    /** @Column(name="NAME" , type="string" , length=50 , nullable=false) **/
    protected $name;
    /** @Column(name="DEVICE_PUSH_ID" , type="string" , length=50 , nullable=false) **/
    protected $devicePushId;

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
?>
