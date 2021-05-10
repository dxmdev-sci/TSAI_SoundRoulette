<?php namespace App\Configuration;

class ConnectionConfiguration {

    //TODO Consider to move it to configuration file.
    private $dsn = "mysql:host=127.0.0.1;dbname=sound_roulette";
    private $username = "root";
    private $password = "pwdpwd";

    /**
     * @return string
     */
    public function getDsn() {
        return $this->dsn;
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }
}
