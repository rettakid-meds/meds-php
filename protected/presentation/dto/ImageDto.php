<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'FileDto.php');

class ImageDto extends Dto 	{

    private $imageId;
    private $file;
    private $width;
    private $height;

	public function __construct()	{
		$this->file = new FileDto();
	}

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

class ImageListDto extends Dto {

	private $images = array();

	public function getImages()	{
		return $this->images;
	}

	public function setImages($images)	{
		$this->images = $images;
	}

}
?>
