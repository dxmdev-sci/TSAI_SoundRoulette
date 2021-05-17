<?php

namespace App\Description\Controller;

use App\Helpers\HttpHeadersHelper;
use App\Helpers\JwtHelper;
use App\Router\RestBodyReader;
use App\Serializer\JsonSerializer;
use App\Description\Entity\DescriptionEntity;
use App\Description\Model\DescriptionRequest;
use App\Description\Repository\DescriptionRepository;
use App\Description\Service\DescriptionService;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use ReflectionClass;
use zpt\anno\Annotations;

/**
 * @Controller(path="/description")
 */
class DescriptionController {

  private $descriptionService;

  /**
   * DescriptionController constructor.
   * @param $descriptionService
   */
  public function __construct() {
    $this->descriptionService = new DescriptionService();
  }


  /**
   * @Action(method="GET")
   */
  public function getDescriptions() {
    echo json_encode(array("test" => "test"));
  }

  /**
   * @Action(method="POST")
   * @Authorized(permission="description_add")
   */
  public function createDescription() {
      $user = JwtHelper::getUserFromAuthToken();

    /** @var DescriptionRequest $request */
    $request = RestBodyReader::readBody(DescriptionRequest::class);

    $descriptionEntity = $this->descriptionService->createDescription($request, $user);

    echo JsonSerializer::getInstance()->serialize($descriptionEntity, 'json');
  }

  /**
   *
   * @Action(method="GET", path="/{id}")
   */
  public function getDescription($id) {
    $descriptionModel = $this->descriptionService->getDescription($id);

    echo JsonSerializer::getInstance()->serialize($descriptionModel, 'json');
  }

  /**
   * @Authorized(permission="description_update")
   * @Action(method="PUT", path="/{id}")
   */
  public function updateDescription($id) {

    $x = new DescriptionRepository();

    /** @var DescriptionEntity $entity */
    $entity = $x->getById($id);

    $entity->setDescription("ala_ma_kota");

    $x->save($entity);
  }

  /**
   * @Authorized(permission="description_deletion")
   * @Action(method="DELETE", path="/{id}")
   */
  public function deleteDescription($id) {
    $user = JwtHelper::getUserFromAuthToken();

    $this->descriptionService->deleteDescription($id, $user);
  }
}
