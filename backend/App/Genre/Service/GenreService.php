<?php


namespace App\Genre\Service;


use App\Database\Entity\Entity;
use App\Database\Entity\EntityMapper;
use App\Helpers\Model\TokenObject;
use App\Helpers\ObjectMapper;
use App\Serializer\JsonSerializer;
use App\Genre\Entity\GenreEntity;
use App\Genre\Model\GenreRequest;
use App\Genre\Model\GenreModel;
use App\Genre\Repository\GenreRepository;

class GenreService {


    private $genreRepository;
    /**
     * @var GenreRepository
     */

    /**
     * GenreService constructor.
     */
    public function __construct() {
        $this->genreRepository = new GenreRepository();
    }

    public function createGenre(GenreRequest $request) {

        $genreEntity = new GenreEntity();

        $genreEntity->setName($request->getName());

        return ObjectMapper::map(
          $this->genreRepository->save($genreEntity),
          GenreModel::class
        );
    }

    /**
     * @param $id
     * @return object
     */
    public function getGenre($id) {
        return ObjectMapper::map(
            $this->genreRepository->getById($id),
            GenreModel::class
        );
    }

    /**
     * @param $id
     * @param TokenObject $tokenObject
     * @throws \Exception
     */
    public function deleteGenre($id, TokenObject $tokenObject) {
        //TODO Later when we change $userId to user object from token, check that user is in admin group.

        if ($id !== $tokenObject->getUserId()) {
            throw new \Exception("User does not have access to given resource");
        }

        $deletedRowsCount = $this->genreRepository->delete($id);

        if ($deletedRowsCount == 0) {
            throw new \Exception(sprintf("Failed user deletion with id: %d", $id));
        }
    }
}
