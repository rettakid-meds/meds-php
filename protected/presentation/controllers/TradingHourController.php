<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TradingHourDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'TradingHourEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'TradingHourBinding.php');

$app->get('/tradinghours', function () use ($app) {
	global $entityManager;
    $queryArray = gettradingHourQueryArray($app);
    $tradingHourEntities = $entityManager->getRepository("TradingHourEntity")->findBy(array());
    $tradingHours = bindTradingHourEntityArray($tradingHourEntities);
    $tradingHours->printData($app);
});

$app->get('/tradinghours/:id', function ($id) use ($app) {
	global $entityManager;
	$tradingHourEntity = $entityManager->find("TradingHourEntity", $id);
	$tradingHourDto = bindTradingHourEntity($tradingHourEntity);
	$tradingHourDto->printData($app);
});

$app->post('/tradinghours', function () use ($app) {
	global $entityManager;
	$tradingHourDto = new TradingHourDto();
	$tradingHourDto = $tradingHourDto->bindXml($app);
	$tradingHourEntity = bindTradingHourDto($tradingHourDto);
	$entityManager->persist($tradingHourEntity);
	$entityManager->flush();
	$tradingHourDto = bindTradingHourEntity($tradingHourEntity);
	$tradingHourDto->printData($app);
});

$app->post('/tradinghours/list', function () use ($app) {
	global $entityManager;
	$tradingHourListDto = new TradingHourListDto();
	$tradingHourListDto = $tradingHourListDto->bindXml($app);
	$tradingHoursArray = array();
	foreach ($tradingHourListDto->getTradingHours() as $tradingHourDto) {
		$tradingHourEntity = bindTradingHourDto($tradingHourDto);
		$entityManager->persist($tradingHourEntity);
		$entityManager->flush();
		array_push($tradingHoursArray,bindTradingHourEntity($tradingHourEntity));
	}
	$tradingHourListDto = new TradingHourListDto();
	$tradingHourListDto->setTradingHours($tradingHoursArray);
	$tradingHourListDto->printData($app);
});

$app->put('/tradinghours/:id', function ($id) use ($app) {
	global $entityManager;
	$tradingHourEntity = $entityManager->find("TradingHourEntity", $id);
	$entityManager->flush();
	$tradingHourDto = bindTradingHourEntity($tradingHourEntity);
	$tradingHourDto->printData($app);
});

$app->delete('/tradinghours/:id', function ($id) use ($app) {
	global $entityManager;
	$tradingHourEntity = $entityManager->find("TradingHourEntity", $id);
	$entityManager->remove($tradingHourEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/tradinghours/:id/tradingdays/mondays', function ($id) use ($app) {
	global $entityManager;
   	$tradingDayEntities = $entityManager->getRepository("TradingDayEntity")->findBy(array('monday'=>$id));
    $tradingDay = bindTradingDayEntityArray($tradingDayEntities);
    $tradingDay->printData($app);
});

$app->get('/tradinghours/:id/tradingdays/tuesdays', function ($id) use ($app) {
	global $entityManager;
   	$tradingDayEntities = $entityManager->getRepository("TradingDayEntity")->findBy(array('tuesday'=>$id));
    $tradingDay = bindTradingDayEntityArray($tradingDayEntities);
    $tradingDay->printData($app);
});

$app->get('/tradinghours/:id/tradingdays/wednesdays', function ($id) use ($app) {
	global $entityManager;
   	$tradingDayEntities = $entityManager->getRepository("TradingDayEntity")->findBy(array('wednesday'=>$id));
    $tradingDay = bindTradingDayEntityArray($tradingDayEntities);
    $tradingDay->printData($app);
});

$app->get('/tradinghours/:id/tradingdays/thursdays', function ($id) use ($app) {
	global $entityManager;
   	$tradingDayEntities = $entityManager->getRepository("TradingDayEntity")->findBy(array('thursday'=>$id));
    $tradingDay = bindTradingDayEntityArray($tradingDayEntities);
    $tradingDay->printData($app);
});

$app->get('/tradinghours/:id/tradingdays/fridays', function ($id) use ($app) {
	global $entityManager;
   	$tradingDayEntities = $entityManager->getRepository("TradingDayEntity")->findBy(array('friday'=>$id));
    $tradingDay = bindTradingDayEntityArray($tradingDayEntities);
    $tradingDay->printData($app);
});

$app->get('/tradinghours/:id/tradingdays/saturdays', function ($id) use ($app) {
	global $entityManager;
   	$tradingDayEntities = $entityManager->getRepository("TradingDayEntity")->findBy(array('saturday'=>$id));
    $tradingDay = bindTradingDayEntityArray($tradingDayEntities);
    $tradingDay->printData($app);
});

$app->get('/tradinghours/:id/tradingdays/sundays', function ($id) use ($app) {
	global $entityManager;
   	$tradingDayEntities = $entityManager->getRepository("TradingDayEntity")->findBy(array('sunday'=>$id));
    $tradingDay = bindTradingDayEntityArray($tradingDayEntities);
    $tradingDay->printData($app);
});

$app->get('/tradinghours/:id/tradingdays/pubicholidays', function ($id) use ($app) {
	global $entityManager;
   	$tradingDayEntities = $entityManager->getRepository("TradingDayEntity")->findBy(array('pubicholiday'=>$id));
    $tradingDay = bindTradingDayEntityArray($tradingDayEntities);
    $tradingDay->printData($app);
});

function gettradingHourQueryArray($app)    {
    $queryArray = array();
    $tradingHourId = $app->request()->get('tradingHourId');
    if ($tradingHourId != null)	{
        $queryArray['tradingHourId'] = $tradingHourId;
    }
    $effFrm = $app->request()->get('effFrm');
    if ($effFrm != null)	{
        $queryArray['effFrm'] = $effFrm;
    }
    $effTo = $app->request()->get('effTo');
    if ($effTo != null)	{
        $queryArray['effTo'] = $effTo;
    }
    $open = $app->request()->get('open');
    if ($open != null)	{
        $queryArray['open'] = $open;
    }
    return $queryArray;
}

?>