<?php

include __DIR__ . "/../vendor/autoload.php";

use Laravel\Lumen\Application;

$app = new Application();

$app->get("/", function() {
    return "Hello from Lumen";
});

$app->run();