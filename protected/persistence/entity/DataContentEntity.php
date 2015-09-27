<?php

/** @Entity @Table(name="MEDS_DATA_CONTENT") **/
class DataContentEntity 	{

    /** @Id @Column(name="DATA_CONTENT_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $dataContentId;
    /** @Column(name="DATA" , type="string" , nullable=false) **/
    protected $data;

    public function getDataContentId()	{
        return $this->dataContentId;
	}

	public function setDataContentId($dataContentId)	{
		$this->dataContentId = $dataContentId;
	}

    public function getData()	{
        return $this->data;
	}

	public function setData($data)	{
		$this->data = $data;
	}


}
?>
