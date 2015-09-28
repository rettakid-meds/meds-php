<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'MondayDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'TuesdayDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'WednesdayDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'ThursdayDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'FridayDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'SaturdayDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'SundayDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'PubicHolidayDto.php');

class TradingDayDto extends Dto 	{

    private $tradingDayId;
    private $monday;
    private $tuesday;
    private $wednesday;
    private $thursday;
    private $friday;
    private $saturday;
    private $sunday;
    private $pubicHoliday;

	public function __construct()	{
		$this->monday = new MondayDto();
		$this->tuesday = new TuesdayDto();
		$this->wednesday = new WednesdayDto();
		$this->thursday = new ThursdayDto();
		$this->friday = new FridayDto();
		$this->saturday = new SaturdayDto();
		$this->sunday = new SundayDto();
		$this->pubicHoliday = new PubicHolidayDto();
	}

    public function getTradingDayId()	{
		return $this->tradingDayId;
	}

	public function setTradingDayId($tradingDayId)	{
		$this->tradingDayId = $tradingDayId;
	}

    public function getMonday()	{
		return $this->monday;
	}

	public function setMonday($monday)	{
		$this->monday = $monday;
	}

    public function getTuesday()	{
		return $this->tuesday;
	}

	public function setTuesday($tuesday)	{
		$this->tuesday = $tuesday;
	}

    public function getWednesday()	{
		return $this->wednesday;
	}

	public function setWednesday($wednesday)	{
		$this->wednesday = $wednesday;
	}

    public function getThursday()	{
		return $this->thursday;
	}

	public function setThursday($thursday)	{
		$this->thursday = $thursday;
	}

    public function getFriday()	{
		return $this->friday;
	}

	public function setFriday($friday)	{
		$this->friday = $friday;
	}

    public function getSaturday()	{
		return $this->saturday;
	}

	public function setSaturday($saturday)	{
		$this->saturday = $saturday;
	}

    public function getSunday()	{
		return $this->sunday;
	}

	public function setSunday($sunday)	{
		$this->sunday = $sunday;
	}

    public function getPubicHoliday()	{
		return $this->pubicHoliday;
	}

	public function setPubicHoliday($pubicHoliday)	{
		$this->pubicHoliday = $pubicHoliday;
	}


}

class TradingDayListDto extends Dto {

	private $tradingDays = array();

	public function getTradingDays()	{
		return $this->tradingDays;
	}

	public function setTradingDays($tradingDays)	{
		$this->tradingDays = $tradingDays;
	}

}
?>
