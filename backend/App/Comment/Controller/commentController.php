<?php

namespace App\Comment\Controller;

use App\Helpers\HttpHeadersHelper;
use App\Helpers\JwtHelper;
use App\Router\RestBodyReader;
use App\Serializer\JsonSerializer;
use App\Comment\Entity\CommentEntity;
use App\Comment\Model\CommentRequest;
use App\Comment\Repository\CommentRepository;
use App\Comment\Service\CommentService;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use ReflectionClass;
use zpt\anno\Annotations;

/**
 * @Controller(path="/comment")
 */
class CommentController {

  private $commentService;

  /**
   * CommentController constructor.
   * @param $commentService
   */
  public function __construct() {
    $this->commentService = new CommentService();
  }


  /**
   * @Action(method="GET")
   */
  public function getGenres() {
    echo json_encode(array("test" => "test"));
  }

  /**
   * @Action(method="POST")
   * @Authorized(permission="comment_add")
   */
  public function createComment() {

    /** @var CommentRequest $request */
    $request = RestBodyReader::readBody(CommentRequest::class);

    $commentEntity = $this->commentService->createComment($request);

    echo JsonSerializer::getInstance()->serialize($commentEntity, 'json');
  }

  /**
   *
   * @Action(method="GET", path="/{id}")
   */
  public function getComment($id) {
    $model = $this->commentService->getComment($id);

    echo JsonSerializer::getInstance()->serialize($model, 'json');
  }

  /**
   * @Authorized(permission="comment_update")
   * @Action(method="PUT", path="/{id}")
   */
  public function updateComment($id) {

    $x = new CommentRepository();

    /** @var CommentEntity $entity */
    $entity = $x->getById($id);

    $entity->setDescription("ala_ma_kota");

    $x->save($entity);
  }

  /**
   * @Authorized(permission="comment_deletion")
   * @Action(method="DELETE", path="/{id}")
   */
  public function deleteComment($id) {
    $user = JwtHelper::getUserFromAuthToken();

    $this->commentService->deleteComment($id, $user);
  }
}
