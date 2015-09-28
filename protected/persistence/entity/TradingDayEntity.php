<?php

/** @Entity @Table(name="MEDS_TRADING_DAY") **/
class TradingDayEntity 	{

    /** @Id @Column(name="TRADING_DAY_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $tradingDayId;
    /** @ManyToOne(targetEntity="TradingHourEntity" , fetch="LAZY") @JoinColumn(name="MONDAY_ID", referencedColumnName="TRADING_HOUR_ID") **/
    protected $monday;
    /** @ManyToOne(targetEntity="TradingHourEntity" , fetch="LAZY") @JoinColumn(name="TUESDAY_ID", referencedColumnName="TRADING_HOUR_ID") **/
    protected $tuesday;
    /** @ManyToOne(targetEntity="TradingHourEntity" , fetch="LAZY") @JoinColumn(name="WEDNESDAY_ID", referencedColumnName="TRADING_HOUR_ID") **/
    protected $wednesday;
    /** @ManyToOne(targetEntity="TradingHourEntity" , fetch="LAZY") @JoinColumn(name="THURSDAY_ID", referencedColumnName="TRADING_HOUR_ID") **/
    protected $thursday;
    /** @ManyToOne(targetEntity="TradingHourEntity" , fetch="LAZY") @JoinColumn(name="FRIDAY_ID", referencedColumnName="TRADING_HOUR_ID") **/
    protected $friday;
    /** @ManyToOne(targetEntity="TradingHourEntity" , fetch="LAZY") @JoinColumn(name="SATURDAY_ID", referencedColumnName="TRADING_HOUR_ID") **/
    protected $saturday;
    /** @ManyToOne(targetEntity="TradingHourEntity" , fetch="LAZY") @JoinColumn(name="SUNDAY_ID", referencedColumnName="TRADING_HOUR_ID") **/
    protected $sunday;
    /** @ManyToOne(targetEntity="TradingHourEntity" , fetch="LAZY") @JoinColumn(name="PUBIC_HOLIDAY_ID", referencedColumnName="TRADING_HOUR_ID") **/
    protected $pubicHoliday;

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
?>
