<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/paths.php");
require_once(DB_DIR."/dbCon.php");
require_once(ROOT_DIR . "/backend/Helpers/ReflectionUtils.php");

abstract class Repository
{
    protected $dbCon;

    public function __construct() {
        $this->dbCon = DB::$con;
    }

    /**
     * @param $id
     * @return Entity
     */
    protected function executeQuery(string $query, array $params) : PDOStatement {
        try {
            $stmt = DB::$con->prepare($query);
            $stmt->execute($params);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $stmt;
    }
    public function getById($id) {

        $query = $this->prepare("Select * from " . $this->getTableName() . " where id=:id");

        $query->execute(array(
            ":id" => $id
        ));

        return $query->fetch();
    }
    public function save(Entity $object) {

        $result = null;

        if (empty($object->getId())) {
            $result = $this->performSave($object);
        } else {
            //TODO implement update method.
            $result = $this->performUpdate($object);
        }

        return $result;
    }

    protected function prepare($statement) {
        $query = $this->dbCon->prepare($statement);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->getEntityName());

        return $query;
    }

    protected abstract function getEntityName();

    protected abstract function getTableName();


    private function performUpdate(Entity $entity){

        $fields = ReflectionUtils::getObjectPublicFields($entity);
        $fields = self::removeNullValuesFromAssoc($fields);

        $fieldNamesString = implode(", ", array_keys($fields));

        $fieldPlaceholders = self::addPrefixToArrayKeys($fields, ":");
        $fieldPlaceholdersString = join(", ", array_keys($fieldPlaceholders));

        $sql = "UPDATE " . $this->getTableName() . "($fieldNamesString) SET ($fieldPlaceholdersString) WHERE id=".$entity->getId();
        $stmt = $this->dbCon->prepare($sql);

        foreach ($fieldPlaceholders as $key => $value) {
            if (is_string($value)) {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            } else {
                $stmt->bindValue($key, $value);
            }
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            //TODO save it to logfile.
            return null;
        }
    }
    private function performSave(Entity $entity) {

        $fields = ReflectionUtils::getObjectPrivateFields($entity);

        $fields = self::removeNullValuesFromAssoc($fields);

        $fieldNamesString = implode(", ", array_keys($fields));

        $fieldPlaceholders = self::addPrefixToArrayKeys($fields, ":");
        $fieldPlaceholdersString = join(", ", array_keys($fieldPlaceholders));

        $sql = "INSERT INTO " . $this->getTableName() . "($fieldNamesString) VALUES ($fieldPlaceholdersString)";
        $stmt = $this->dbCon->prepare($sql);

        foreach ($fieldPlaceholders as $key => $value) {
            if (is_string($value)) {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            } else {
                $stmt->bindValue($key, $value);
            }
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            //TODO save it to logfile.
            return null;
        }

        return $this->getById($this->dbCon->lastInsertId());
    }
    private static function addPrefixToArrayKeys($array, $prefix) {
        $resultArray = array();

        foreach ($array as $key => $value) {
            $resultArray[$prefix . $key] = $value;
        }

        return $resultArray;
    }

    private static function removeNullValuesFromAssoc($array) {

        return array_filter($array, function ($value) {
            return $value != null && $value != "";
        });
    }
}