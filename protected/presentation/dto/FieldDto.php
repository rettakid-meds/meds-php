<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class FieldDto extends Dto 	{

    private $fieldId;
    private $name;
    private $mapColor;

	public function __construct()	{
	}

    public function getFieldId()	{
		return $this->fieldId;
	}

	public function setFieldId($fieldId)	{
		$this->fieldId = $fieldId;
	}

    public function getName()	{
		return $this->name;
	}

	public function setName($name)	{
		$this->name = $name;
	}

    public function getMapColor()	{
		return $this->mapColor;
	}

	public function setMapColor($mapColor)	{
		$this->mapColor = $mapColor;
	}


}

class FieldListDto extends Dto {

	private $fields = array();

	public function getFields()	{
		return $this->fields;
	}

	public function setFields($fields)	{
		$this->fields = $fields;
	}

}
?>
