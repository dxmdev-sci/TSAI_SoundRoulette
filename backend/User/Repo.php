<?php
require_once(DB_DIR."/dbCon.php");
require_once(DB_DIR."/Repository.php");
require_once("Entity.php");

class UserRepository extends Repository{
    public function getEntityName(){return "UserEntity";}
    public function getTableName(){return "user";}

    /** returns false if password incorrect.
     * returns user.id if password correct.
     * @param $username
     * @param $password
     * @return false|int
     */
    private function verifyPassword($username, $password){
        $query = "SELECT id, password FROM user WHERE username=:user";
        $stmt = $this->executeQuery($query,[':user'=>$username]);

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $hash = $res['password'];
        if(password_verify($password,$hash)){
            return true;
        }
        return false;
    }

    /** LOGIN FUNCTION
     * returns User object */
    public function login(string $username,string $password)
    {
        //Verify password
        $id = $this->verifyPassword($username, $password);
        if ($id !== false) {
            //fetch user
            return $this->getById($id);
        }
        //Authentication failed
        return false;
    }

    public function changePassword(UserEntity $user, string $newPassword){
        $query = "UPDATE user SET password=:hash WHERE id=".$user->getId();
        $hashedPwd = password_hash($newPassword, PASSWORD_ARGON2I);
        $this->executeQuery($query, [':hash'=>$hashedPwd]);
    }
}