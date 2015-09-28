<?php

/** @Entity @Table(name="MEDS_TRADING_HOUR") **/
class TradingHourEntity 	{

    /** @Id @Column(name="TRADING_HOUR_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $tradingHourId;
    /** @Column(name="EFF_FRM" , type="date") **/
    protected $effFrm;
    /** @Column(name="EFF_TO" , type="date") **/
    protected $effTo;
    /** @Column(name="OPEN" , type="boolean" , nullable=false) **/
    protected $open;

    public function getTradingHourId()	{
        return $this->tradingHourId;
	}

	public function setTradingHourId($tradingHourId)	{
		$this->tradingHourId = $tradingHourId;
	}

    public function getEffFrm()	{
        return $this->effFrm;
	}

	public function setEffFrm($effFrm)	{
		$this->effFrm = $effFrm;
	}

    public function getEffTo()	{
        return $this->effTo;
	}

	public function setEffTo($effTo)	{
		$this->effTo = $effTo;
	}

    public function getOpen()	{
        return ($this->open) ? 'true' : 'false';
	}

	public function setOpen($open)	{
		$this->open = $open;
	}


}
?>
