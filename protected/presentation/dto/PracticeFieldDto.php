<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'FieldDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'PracticeDto.php');

class PracticeFieldDto extends Dto 	{

    private $practiceFieldId;
    private $field;
    private $practice;

	public function __construct()	{
		$this->field = new FieldDto();
		$this->practice = new PracticeDto();
	}

    public function getPracticeFieldId()	{
		return $this->practiceFieldId;
	}

	public function setPracticeFieldId($practiceFieldId)	{
		$this->practiceFieldId = $practiceFieldId;
	}

    public function getField()	{
		return $this->field;
	}

	public function setField($field)	{
		$this->field = $field;
	}

    public function getPractice()	{
		return $this->practice;
	}

	public function setPractice($practice)	{
		$this->practice = $practice;
	}


}

class PracticeFieldListDto extends Dto {

	private $practiceFields = array();

	public function getPracticeFields()	{
		return $this->practiceFields;
	}

	public function setPracticeFields($practiceFields)	{
		$this->practiceFields = $practiceFields;
	}

}
?>
