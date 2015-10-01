<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PracticeFieldDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'PracticeFieldEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'PracticeFieldBinding.php');

$app->get('/practicefields', function () use ($app) {
	global $entityManager;
    $queryArray = getpracticeFieldQueryArray($app);
    $practiceFieldEntities = $entityManager->getRepository("PracticeFieldEntity")->findBy(array());
    $practiceFields = bindPracticeFieldEntityArray($practiceFieldEntities);
    $practiceFields->printData($app);
});

$app->get('/practicefields/:id', function ($id) use ($app) {
	global $entityManager;
	$practiceFieldEntity = $entityManager->find("PracticeFieldEntity", $id);
	$practiceFieldDto = bindPracticeFieldEntity($practiceFieldEntity);
	$practiceFieldDto->printData($app);
});

$app->post('/practicefields', function () use ($app) {
	global $entityManager;
	$practiceFieldDto = new PracticeFieldDto();
	$practiceFieldDto = $practiceFieldDto->bindXml($app);
	$practiceFieldEntity = bindPracticeFieldDto($practiceFieldDto);
	$entityManager->persist($practiceFieldEntity);
	$entityManager->flush();
	$practiceFieldDto = bindPracticeFieldEntity($practiceFieldEntity);
	$practiceFieldDto->printData($app);
});

$app->post('/practicefields/list', function () use ($app) {
	global $entityManager;
	$practiceFieldListDto = new PracticeFieldListDto();
	$practiceFieldListDto = $practiceFieldListDto->bindXml($app);
	$practiceFieldsArray = array();
	foreach ($practiceFieldListDto->getPracticeFields() as $practiceFieldDto) {
		$practiceFieldEntity = bindPracticeFieldDto($practiceFieldDto);
		$entityManager->persist($practiceFieldEntity);
		$entityManager->flush();
		array_push($practiceFieldsArray,bindPracticeFieldEntity($practiceFieldEntity));
	}
	$practiceFieldListDto = new PracticeFieldListDto();
	$practiceFieldListDto->setPracticeFields($practiceFieldsArray);
	$practiceFieldListDto->printData($app);
});

$app->put('/practicefields/:id', function ($id) use ($app) {
	global $entityManager;
	$practiceFieldEntity = $entityManager->find("PracticeFieldEntity", $id);
	$entityManager->flush();
	$practiceFieldDto = bindPracticeFieldEntity($practiceFieldEntity);
	$practiceFieldDto->printData($app);
});

$app->delete('/practicefields/:id', function ($id) use ($app) {
	global $entityManager;
	$practiceFieldEntity = $entityManager->find("PracticeFieldEntity", $id);
	$entityManager->remove($practiceFieldEntity);
	$entityManager->flush();
});

/*Referances*/

function getpracticeFieldQueryArray($app)    {
    $queryArray = array();
    $practiceFieldId = $app->request()->get('practiceFieldId');
    if ($practiceFieldId != null)	{
        $queryArray['practiceFieldId'] = $practiceFieldId;
    }
    $field = $app->request()->get('field');
    if ($field != null)	{
        $queryArray['field'] = $field;
    }
    $practice = $app->request()->get('practice');
    if ($practice != null)	{
        $queryArray['practice'] = $practice;
    }
    return $queryArray;
}

?>