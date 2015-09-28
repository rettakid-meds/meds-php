<?php

/** @Entity @Table(name="MEDS_FIELD") **/
class FieldEntity 	{

    /** @Id @Column(name="FIELD_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $fieldId;
    /** @Column(name="NAME" , type="string" , length=20 , nullable=false) **/
    protected $name;
    /** @Column(name="MAP_COLOR" , type="string" , length=6 , nullable=false) **/
    protected $mapColor;

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
?>
