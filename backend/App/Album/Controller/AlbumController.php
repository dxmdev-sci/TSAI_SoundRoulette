<?php

namespace App\Album\Controller;

use App\Helpers\HttpHeadersHelper;
use App\Helpers\JwtHelper;
use App\Router\RestBodyReader;
use App\Serializer\JsonSerializer;
use App\Album\Entity\AlbumEntity;
use App\Album\Model\AlbumRequest;
use App\Album\Repository\AlbumRepository;
use App\Album\Service\AlbumService;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use ReflectionClass;
use zpt\anno\Annotations;

/**
 * @Controller(path="/album")
 */
class AlbumController {

  private $albumService;

  /**
   * AlbumController constructor.
   * @param $albumService
   */
  public function __construct() {
    $this->albumService = new AlbumService();
  }


  /**
   * @Action(method="GET")
   */
  public function getAlbums() {
    echo json_encode(array("test" => "test"));
  }

  /**
   * @Action(method="POST")
   * @Authorized(permission="album_add")
   */
  public function createAlbum() {

    /** @var AlbumRequest $request */
    $request = RestBodyReader::readBody(AlbumRequest::class);

    $albumEntity = $this->albumService->createAlbum($request);

    echo JsonSerializer::getInstance()->serialize($albumEntity, 'json');
  }

  /**
   *
   * @Action(method="GET", path="/{id}")
   */
  public function getAlbum($id) {
    $albumModel = $this->albumService->getAlbum($id);

    echo JsonSerializer::getInstance()->serialize($albumModel, 'json');
  }

  /**
   * @Authorized(permission="album_update")
   * @Action(method="PUT", path="/{id}")
   */
  public function updateAlbum($id) {

    $x = new albumRepository();

    /** @var AlbumEntity $entity */
    $entity = $x->getById($id);

    $entity->setName("ala_ma_kota");

    $x->save($entity);
  }

  /**
   * @Authorized(permission="album_deletion")
   * @Action(method="DELETE", path="/{id}")
   */
  public function deleteAlbum($id) {
    $user = JwtHelper::getUserFromAuthToken();

    $this->albumService->deleteAlbum($id, $user);
  }
}
