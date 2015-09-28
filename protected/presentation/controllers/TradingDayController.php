<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TradingDayDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'TradingDayEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'TradingDayBinding.php');

$app->get('/tradingdays', function () use ($app) {
	global $entityManager;
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

$app->get('/tradingdays/:id/practices', function ($id) use ($app) {
	global $entityManager;
   	$practiceEntities = $entityManager->getRepository("PracticeEntity")->findBy(array('tradingday'=>$id));
    $practice = bindPracticeEntityArray($practiceEntities);
    $practice->printData($app);
});

?>