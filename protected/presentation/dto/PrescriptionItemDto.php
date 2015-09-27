<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'PrescriptionDto.php');

class PrescriptionItemDto extends Dto 	{

    private $prescriptionItemId;
    private $prescription;
    private $name;

	public function __construct()	{
		$this->prescription = new PrescriptionDto();
	}

    public function getPrescriptionItemId()	{
		return $this->prescriptionItemId;
	}

	public function setPrescriptionItemId($prescriptionItemId)	{
		$this->prescriptionItemId = $prescriptionItemId;
	}

    public function getPrescription()	{
		return $this->prescription;
	}

	public function setPrescription($prescription)	{
		$this->prescription = $prescription;
	}

    public function getName()	{
		return $this->name;
	}

	public function setName($name)	{
		$this->name = $name;
	}


}

class PrescriptionItemListDto extends Dto {

	private $prescriptionItems = array();

	public function getPrescriptionItems()	{
		return $this->prescriptionItems;
	}

	public function setPrescriptionItems($prescriptionItems)	{
		$this->prescriptionItems = $prescriptionItems;
	}

}
?>
