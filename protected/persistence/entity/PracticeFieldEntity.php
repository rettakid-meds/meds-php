<?php

/** @Entity @Table(name="MEDS_PRACTICE_FIELD") **/
class PracticeFieldEntity 	{

    /** @Id @Column(name="PRACTICE_FIELD_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $practiceFieldId;
    /** @ManyToOne(targetEntity="FieldEntity" , fetch="LAZY") @JoinColumn(name="FIELD_ID", referencedColumnName="FIELD_ID") **/
    protected $field;
    /** @ManyToOne(targetEntity="PracticeEntity" , fetch="LAZY") @JoinColumn(name="PRACTICE_ID", referencedColumnName="PRACTICE_ID") **/
    protected $practice;

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
?>
