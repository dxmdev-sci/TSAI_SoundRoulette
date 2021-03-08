<?php namespace App;

require __DIR__ . '/vendor/autoload.php';
use App\Router\RestRouter;

class Main {

    public function run() {
        RestRouter::run();
    }
}