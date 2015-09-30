<?php

/** @Entity @Table(name="MEDS_DOCTOR") **/
class DoctorEntity 	{

    /** @Id @Column(name="DOCTOR_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $doctorId;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="USER_ID", referencedColumnName="USER_ID") **/
    protected $user;
    /** @ManyToOne(targetEntity="DataContentEntity" , fetch="LAZY") @JoinColumn(name="ICON_ID", referencedColumnName="DATA_CONTENT_ID") **/
    protected $icon;
    /** @ManyToOne(targetEntity="ImageEntity" , fetch="LAZY") @JoinColumn(name="IMAGE_ID", referencedColumnName="IMAGE_ID") **/
    protected $image;
    /** @ManyToOne(targetEntity="DataContentEntity" , fetch="LAZY") @JoinColumn(name="BIO_ID", referencedColumnName="DATA_CONTENT_ID") **/
    protected $bio;

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

    public function getIcon()	{
        return $this->icon;
	}

	public function setIcon($icon)	{
		$this->icon = $icon;
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
?>
