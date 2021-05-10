<?php

namespace App\Genre\Controller;

use App\Helpers\HttpHeadersHelper;
use App\Helpers\JwtHelper;
use App\Router\RestBodyReader;
use App\Serializer\JsonSerializer;
use App\Genre\Entity\GenreEntity;
use App\Genre\Model\GenreRequest;
use App\Genre\Repository\GenreRepository;
use App\Genre\Service\GenreService;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use ReflectionClass;
use zpt\anno\Annotations;

/**
 * @Controller(path="/genre")
 */
class GenreController {

  private $genreService;

  /**
   * GenreController constructor.
   * @param $genreService
   */
  public function __construct() {
    $this->genreService = new GenreService();
  }


  /**
   * @Action(method="GET")
   */
  public function getGenres() {
    echo json_encode(array("test" => "test"));
  }

  /**
   * @Action(method="POST")
   * @Authorized(permission="genre_add")
   */
  public function createGenre() {

    /** @var GenreRequest $request */
    $request = RestBodyReader::readBody(GenreRequest::class);

    $genreEntity = $this->genreService->createGenre($request);

    echo JsonSerializer::getInstance()->serialize($genreEntity, 'json');
  }

  /**
   *
   * @Action(method="GET", path="/{id}")
   */
  public function getGenre($id) {
    $GenreModel = $this->genreService->getGenre($id);

    echo JsonSerializer::getInstance()->serialize($this->genreModel, 'json');
  }

  /**
   * @Authorized(permission="genre_update")
   * @Action(method="PUT", path="/{id}")
   */
  public function updateGenre($id) {

    $x = new GenreRepository();

    /** @var GenreEntity $entity */
    $entity = $x->getById($id);

    $entity->setName("ala_ma_kota");

    $x->save($entity);
  }

  /**
   * @Authorized(permission="genre_deletion")
   * @Action(method="DELETE", path="/{id}")
   */
  public function deleteGenre($id) {
    $user = JwtHelper::getUserFromAuthToken();

    $this->genreService->deleteGenre($id, $user);
  }
}
