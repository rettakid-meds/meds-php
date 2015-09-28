<?php

/** @Entity @Table(name="MEDS_PRESCRIPTION_ITEM") **/
class PrescriptionItemEntity 	{

    /** @Id @Column(name="PRESCRIPTION_ITEM_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $prescriptionItemId;
    /** @ManyToOne(targetEntity="PrescriptionEntity" , fetch="LAZY") @JoinColumn(name="PRESCRIPTION_ID", referencedColumnName="PRESCRIPTION_ID") **/
    protected $prescription;
    /** @Column(name="NAME" , type="string" , length=50 , nullable=false) **/
    protected $name;

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
?>
