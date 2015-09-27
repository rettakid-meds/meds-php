<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DataContentDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'DataContentEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'DataContentBinding.php');

$app->get('/datacontents', function () use ($app) {
	global $entityManager;
   	$dataContentEntities = $entityManager->getRepository("DataContentEntity")->findBy(array());
    $dataContents = bindDataContentEntityArray($dataContentEntities);
    $dataContents->printData($app);
});

$app->get('/datacontents/:id', function ($id) use ($app) {
	global $entityManager;
	$dataContentEntity = $entityManager->find("DataContentEntity", $id);
	$dataContentDto = bindDataContentEntity($dataContentEntity);
	$dataContentDto->printData($app);
});

$app->post('/datacontents', function () use ($app) {
	global $entityManager;
	$dataContentDto = new DataContentDto();
	$dataContentDto = $dataContentDto->bindXml($app);
	$dataContentEntity = bindDataContentDto($dataContentDto);
	$entityManager->persist($dataContentEntity);
	$entityManager->flush();
	$dataContentDto = bindDataContentEntity($dataContentEntity);
	$dataContentDto->printData($app);
});

$app->post('/datacontents/list', function () use ($app) {
	global $entityManager;
	$dataContentListDto = new DataContentListDto();
	$dataContentListDto = $dataContentListDto->bindXml($app);
	$dataContentsArray = array();
	foreach ($dataContentListDto->getDataContents() as $dataContentDto) {
		$dataContentEntity = bindDataContentDto($dataContentDto);
		$entityManager->persist($dataContentEntity);
		$entityManager->flush();
		array_push($dataContentsArray,bindDataContentEntity($dataContentEntity));
	}
	$dataContentListDto = new DataContentListDto();
	$dataContentListDto->setDataContents($dataContentsArray);
	$dataContentListDto->printData($app);
});

$app->put('/datacontents/:id', function ($id) use ($app) {
	global $entityManager;
	$dataContentEntity = $entityManager->find("DataContentEntity", $id);
	$entityManager->flush();
	$dataContentDto = bindDataContentEntity($dataContentEntity);
	$dataContentDto->printData($app);
});

$app->delete('/datacontents/:id', function ($id) use ($app) {
	global $entityManager;
	$dataContentEntity = $entityManager->find("DataContentEntity", $id);
	$entityManager->remove($dataContentEntity);
	$entityManager->flush();
});

/*Referances*/

?>