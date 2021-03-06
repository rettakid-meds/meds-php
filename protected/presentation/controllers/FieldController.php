<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'FieldDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'FieldEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'FieldBinding.php');

$app->get('/fields', function () use ($app) {
	global $entityManager;
    $queryArray = getfieldQueryArray($app);
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

$app->get('/fields/:id/practicefields/fields', function ($id) use ($app) {
	global $entityManager;
   	$practiceFieldEntities = $entityManager->getRepository("PracticeFieldEntity")->findBy(array('field'=>$id));
    $practiceField = bindPracticeFieldEntityArray($practiceFieldEntities);
    $practiceField->printData($app);
});

function getfieldQueryArray($app)    {
    $queryArray = array();
    $fieldId = $app->request()->get('fieldId');
    if ($fieldId != null)	{
        $queryArray['fieldId'] = $fieldId;
    }
    $name = $app->request()->get('name');
    if ($name != null)	{
        $queryArray['name'] = $name;
    }
    $mapColor = $app->request()->get('mapColor');
    if ($mapColor != null)	{
        $queryArray['mapColor'] = $mapColor;
    }
    return $queryArray;
}

?>