<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class TradingHourDto extends Dto 	{

    private $tradingHourId;
    private $effFrm;
    private $effTo;
    private $open;

	public function __construct()	{
		$this->effFrm = new \DateTime("now");
		$this->effTo = new \DateTime("now");
	}

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
		return $this->open;
	}

	public function setOpen($open)	{
		$this->open = $open;
	}


}

class TradingHourListDto extends Dto {

	private $tradingHours = array();

	public function getTradingHours()	{
		return $this->tradingHours;
	}

	public function setTradingHours($tradingHours)	{
		$this->tradingHours = $tradingHours;
	}

}
?>
