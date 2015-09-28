<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class FileDto extends Dto 	{

    private $fileId;
    private $guid;
    private $name;
    private $effFrm;

	public function __construct()	{
		$this->effFrm = new \DateTime("now");
	}

    public function getFileId()	{
		return $this->fileId;
	}

	public function setFileId($fileId)	{
		$this->fileId = $fileId;
	}

    public function getGuid()	{
		return $this->guid;
	}

	public function setGuid($guid)	{
		$this->guid = $guid;
	}

    public function getName()	{
		return $this->name;
	}

	public function setName($name)	{
		$this->name = $name;
	}

    public function getEffFrm()	{
		return $this->effFrm;
	}

	public function setEffFrm($effFrm)	{
		$this->effFrm = $effFrm;
	}


}

class FileListDto extends Dto {

	private $files = array();

	public function getFiles()	{
		return $this->files;
	}

	public function setFiles($files)	{
		$this->files = $files;
	}

}
?>
