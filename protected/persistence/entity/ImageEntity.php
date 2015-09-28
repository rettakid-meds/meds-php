<?php

/** @Entity @Table(name="MEDS_IMAGE") **/
class ImageEntity 	{

    /** @Id @Column(name="IMAGE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $imageId;
    /** @ManyToOne(targetEntity="FileEntity" , fetch="LAZY") @JoinColumn(name="FILE_ID", referencedColumnName="FILE_ID") **/
    protected $file;
    /** @Column(name="WIDTH" , type="integer" , length=5 , nullable=false) **/
    protected $width;
    /** @Column(name="HEIGHT" , type="integer" , length=5 , nullable=false) **/
    protected $height;

    public function getImageId()	{
        return $this->imageId;
	}

	public function setImageId($imageId)	{
		$this->imageId = $imageId;
	}

    public function getFile()	{
        return $this->file;
	}

	public function setFile($file)	{
		$this->file = $file;
	}

    public function getWidth()	{
        return $this->width;
	}

	public function setWidth($width)	{
		$this->width = $width;
	}

    public function getHeight()	{
        return $this->height;
	}

	public function setHeight($height)	{
		$this->height = $height;
	}


}
?>
