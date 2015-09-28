<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TradingHourDto.php');

function bindTradingHourDto($tradingHourDto)	{
	if ($tradingHourDto != null)	{
	    global $entityManager;
		$tradingHourEntity = new TradingHourEntity();
        $tradingHourEntity->setTradingHourId($tradingHourDto->getTradingHourId());
        $tradingHourEntity->setEffFrm($tradingHourDto->getEffFrm());
        $tradingHourEntity->setEffTo($tradingHourDto->getEffTo());
        $tradingHourEntity->setOpen($tradingHourDto->getOpen());
        return $tradingHourEntity;
    }	else {
        return null;
    }
}

function bindTradingHourEntity($tradingHourEntity)	{
	if ($tradingHourEntity != null)	{
		$tradingHourDto = new TradingHourDto();
        $tradingHourDto->setTradingHourId($tradingHourEntity->getTradingHourId());
        $tradingHourDto->setEffFrm($tradingHourEntity->getEffFrm());
        $tradingHourDto->setEffTo($tradingHourEntity->getEffTo());
        $tradingHourDto->setOpen($tradingHourEntity->getOpen());
        return $tradingHourDto;
    }	else {
        return null;
    }
}

function bindTradingHourEntityArray($tradingHourEntitys)   {
    $tradingHourDtos = new TradingHourListDto();
    $tradingHourDtoArray = array();
    foreach ($tradingHourEntitys as $tradingHourEntity => $value) {
        array_push($tradingHourDtoArray, bindTradingHourEntity($value));
    }
    $tradingHourDtos->setTradingHours($tradingHourDtoArray);
    return $tradingHourDtos;
}

?>