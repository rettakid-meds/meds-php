<?php

/** @Entity @Table(name="MEDS_FILE") **/
class FileEntity 	{

    /** @Id @Column(name="FILE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $fileId;
    /** @Column(name="GUID" , type="string" , length=50 , nullable=false) **/
    protected $guid;
    /** @Column(name="NAME" , type="string" , length=50 , nullable=false) **/
    protected $name;
    /** @Column(name="EFF_FRM" , type="datetime" , nullable=false) **/
    protected $effFrm;

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
?>
