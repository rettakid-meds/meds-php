<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TradingDayDto.php');

function bindTradingDayDto($tradingDayDto)	{
	if ($tradingDayDto != null)	{
	    global $entityManager;
		$tradingDayEntity = new TradingDayEntity();
        $tradingDayEntity->setTradingDayId($tradingDayDto->getTradingDayId());
        $tradingDayEntity->setMonday($entityManager->find("MondayEntity", $tradingDayDto->getMonday()->getMondayId()));
        $tradingDayEntity->setTuesday($entityManager->find("TuesdayEntity", $tradingDayDto->getTuesday()->getTuesdayId()));
        $tradingDayEntity->setWednesday($entityManager->find("WednesdayEntity", $tradingDayDto->getWednesday()->getWednesdayId()));
        $tradingDayEntity->setThursday($entityManager->find("ThursdayEntity", $tradingDayDto->getThursday()->getThursdayId()));
        $tradingDayEntity->setFriday($entityManager->find("FridayEntity", $tradingDayDto->getFriday()->getFridayId()));
        $tradingDayEntity->setSaturday($entityManager->find("SaturdayEntity", $tradingDayDto->getSaturday()->getSaturdayId()));
        $tradingDayEntity->setSunday($entityManager->find("SundayEntity", $tradingDayDto->getSunday()->getSundayId()));
        $tradingDayEntity->setPubicHoliday($entityManager->find("PubicHolidayEntity", $tradingDayDto->getPubicHoliday()->getPubicHolidayId()));
        return $tradingDayEntity;
    }	else {
        return null;
    }
}

function bindTradingDayEntity($tradingDayEntity)	{
	if ($tradingDayEntity != null)	{
		$tradingDayDto = new TradingDayDto();
        $tradingDayDto->setTradingDayId($tradingDayEntity->getTradingDayId());
        $tradingDayDto->setMonday(bindTradingHourEntity($tradingDayEntity->getMonday()));
        $tradingDayDto->setTuesday(bindTradingHourEntity($tradingDayEntity->getTuesday()));
        $tradingDayDto->setWednesday(bindTradingHourEntity($tradingDayEntity->getWednesday()));
        $tradingDayDto->setThursday(bindTradingHourEntity($tradingDayEntity->getThursday()));
        $tradingDayDto->setFriday(bindTradingHourEntity($tradingDayEntity->getFriday()));
        $tradingDayDto->setSaturday(bindTradingHourEntity($tradingDayEntity->getSaturday()));
        $tradingDayDto->setSunday(bindTradingHourEntity($tradingDayEntity->getSunday()));
        $tradingDayDto->setPubicHoliday(bindTradingHourEntity($tradingDayEntity->getPubicHoliday()));
        return $tradingDayDto;
    }	else {
        return null;
    }
}

function bindTradingDayEntityArray($tradingDayEntitys)   {
    $tradingDayDtos = new TradingDayListDto();
    $tradingDayDtoArray = array();
    foreach ($tradingDayEntitys as $tradingDayEntity => $value) {
        array_push($tradingDayDtoArray, bindTradingDayEntity($value));
    }
    $tradingDayDtos->setTradingDays($tradingDayDtoArray);
    return $tradingDayDtos;
}

?>