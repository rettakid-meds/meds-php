<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TradingDayDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'TradingDayEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'TradingDayBinding.php');

$app->get('/tradingdays', function () use ($app) {
	global $entityManager;
    $queryArray = gettradingDayQueryArray($app);
    $tradingDayEntities = $entityManager->getRepository("TradingDayEntity")->findBy(array());
    $tradingDays = bindTradingDayEntityArray($tradingDayEntities);
    $tradingDays->printData($app);
});

$app->get('/tradingdays/:id', function ($id) use ($app) {
	global $entityManager;
	$tradingDayEntity = $entityManager->find("TradingDayEntity", $id);
	$tradingDayDto = bindTradingDayEntity($tradingDayEntity);
	$tradingDayDto->printData($app);
});

$app->post('/tradingdays', function () use ($app) {
	global $entityManager;
	$tradingDayDto = new TradingDayDto();
	$tradingDayDto = $tradingDayDto->bindXml($app);
	$tradingDayEntity = bindTradingDayDto($tradingDayDto);
	$entityManager->persist($tradingDayEntity);
	$entityManager->flush();
	$tradingDayDto = bindTradingDayEntity($tradingDayEntity);
	$tradingDayDto->printData($app);
});

$app->post('/tradingdays/list', function () use ($app) {
	global $entityManager;
	$tradingDayListDto = new TradingDayListDto();
	$tradingDayListDto = $tradingDayListDto->bindXml($app);
	$tradingDaysArray = array();
	foreach ($tradingDayListDto->getTradingDays() as $tradingDayDto) {
		$tradingDayEntity = bindTradingDayDto($tradingDayDto);
		$entityManager->persist($tradingDayEntity);
		$entityManager->flush();
		array_push($tradingDaysArray,bindTradingDayEntity($tradingDayEntity));
	}
	$tradingDayListDto = new TradingDayListDto();
	$tradingDayListDto->setTradingDays($tradingDaysArray);
	$tradingDayListDto->printData($app);
});

$app->put('/tradingdays/:id', function ($id) use ($app) {
	global $entityManager;
	$tradingDayEntity = $entityManager->find("TradingDayEntity", $id);
	$entityManager->flush();
	$tradingDayDto = bindTradingDayEntity($tradingDayEntity);
	$tradingDayDto->printData($app);
});

$app->delete('/tradingdays/:id', function ($id) use ($app) {
	global $entityManager;
	$tradingDayEntity = $entityManager->find("TradingDayEntity", $id);
	$entityManager->remove($tradingDayEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/tradingdays/:id/practices/tradingdays', function ($id) use ($app) {
	global $entityManager;
   	$practiceEntities = $entityManager->getRepository("PracticeEntity")->findBy(array('tradingday'=>$id));
    $practice = bindPracticeEntityArray($practiceEntities);
    $practice->printData($app);
});

function gettradingDayQueryArray($app)    {
    $queryArray = array();
    $tradingDayId = $app->request()->get('tradingDayId');
    if ($tradingDayId != null)	{
        $queryArray['tradingDayId'] = $tradingDayId;
    }
    $monday = $app->request()->get('monday');
    if ($monday != null)	{
        $queryArray['monday'] = $monday;
    }
    $tuesday = $app->request()->get('tuesday');
    if ($tuesday != null)	{
        $queryArray['tuesday'] = $tuesday;
    }
    $wednesday = $app->request()->get('wednesday');
    if ($wednesday != null)	{
        $queryArray['wednesday'] = $wednesday;
    }
    $thursday = $app->request()->get('thursday');
    if ($thursday != null)	{
        $queryArray['thursday'] = $thursday;
    }
    $friday = $app->request()->get('friday');
    if ($friday != null)	{
        $queryArray['friday'] = $friday;
    }
    $saturday = $app->request()->get('saturday');
    if ($saturday != null)	{
        $queryArray['saturday'] = $saturday;
    }
    $sunday = $app->request()->get('sunday');
    if ($sunday != null)	{
        $queryArray['sunday'] = $sunday;
    }
    $pubicHoliday = $app->request()->get('pubicHoliday');
    if ($pubicHoliday != null)	{
        $queryArray['pubicHoliday'] = $pubicHoliday;
    }
    return $queryArray;
}

?>