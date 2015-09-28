<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'FieldDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'FieldEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'FieldBinding.php');

$app->get('/fields', function () use ($app) {
	global $entityManager;
   	$fieldEntities = $entityManager->getRepository("FieldEntity")->findBy(array());
    $fields = bindFieldEntityArray($fieldEntities);
    $fields->printData($app);
});

$app->get('/fields/:id', function ($id) use ($app) {
	global $entityManager;
	$fieldEntity = $entityManager->find("FieldEntity", $id);
	$fieldDto = bindFieldEntity($fieldEntity);
	$fieldDto->printData($app);
});

$app->post('/fields', function () use ($app) {
	global $entityManager;
	$fieldDto = new FieldDto();
	$fieldDto = $fieldDto->bindXml($app);
	$fieldEntity = bindFieldDto($fieldDto);
	$entityManager->persist($fieldEntity);
	$entityManager->flush();
	$fieldDto = bindFieldEntity($fieldEntity);
	$fieldDto->printData($app);
});

$app->post('/fields/list', function () use ($app) {
	global $entityManager;
	$fieldListDto = new FieldListDto();
	$fieldListDto = $fieldListDto->bindXml($app);
	$fieldsArray = array();
	foreach ($fieldListDto->getFields() as $fieldDto) {
		$fieldEntity = bindFieldDto($fieldDto);
		$entityManager->persist($fieldEntity);
		$entityManager->flush();
		array_push($fieldsArray,bindFieldEntity($fieldEntity));
	}
	$fieldListDto = new FieldListDto();
	$fieldListDto->setFields($fieldsArray);
	$fieldListDto->printData($app);
});

$app->put('/fields/:id', function ($id) use ($app) {
	global $entityManager;
	$fieldEntity = $entityManager->find("FieldEntity", $id);
	$entityManager->flush();
	$fieldDto = bindFieldEntity($fieldEntity);
	$fieldDto->printData($app);
});

$app->delete('/fields/:id', function ($id) use ($app) {
	global $entityManager;
	$fieldEntity = $entityManager->find("FieldEntity", $id);
	$entityManager->remove($fieldEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/fields/:id/practices', function ($id) use ($app) {
	global $entityManager;
   	$practiceFieldEntities = $entityManager->getRepository("PracticeFieldEntity")->findBy(array('practice'=>$id));
    $practiceField = bindPracticeFieldEntityArray($practiceFieldEntities);
    $practiceField->printData($app);
});

?>